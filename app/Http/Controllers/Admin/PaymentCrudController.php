<?php

namespace App\Http\Controllers\Admin;

use App\Filters\PaymentFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePaymentRequest;
use App\Http\Requests\Admin\UpdatePaymentRequest;
use App\Models\Payment;
use App\Repositories\CheckoutRepository;
use App\Repositories\PaymentRepository;
use App\Settings\PaymentSettings;
use App\Transformers\Admin\PaymentDetailsTransformer;
use App\Transformers\Admin\PaymentTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Settings\BillingSettings;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PaymentCrudController extends Controller
{
    /**
     * @var PaymentSettings
     */
    private PaymentSettings $paymentSettings;
    /**
     * @var CheckoutRepository
     */
    private CheckoutRepository $checkoutRepository;
    /**
     * @var PaymentRepository
     */
    private PaymentRepository $paymentRepository;

    public function __construct(PaymentSettings $paymentSettings, CheckoutRepository $checkoutRepository)
    {
        $this->middleware(['role:admin']);
        $this->paymentSettings = $paymentSettings;
        $this->checkoutRepository = $checkoutRepository;
    }

    /**
     * List all payments
     *
     * @param PaymentFilters $filters
     * @return \Inertia\Response
     */
    public function index(PaymentFilters $filters)
    {
        $paymentProcessors = [];

        foreach (config('tutor11.payment_processors') as $key => $value) {
            if($this->paymentSettings->toArray()['enable_'.$key]) {
                array_push($paymentProcessors, [
                    'value' => $key,
                    'text' => $value['name'],
                ]);
            }
        }

        return view('Admin/Payments', [
            'payments' => function () use($filters) {
                return fractal(Payment::with(['plan', 'user'])->latest()->filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new PaymentTransformer())->toArray();
            },
            'paymentProcessors' => $paymentProcessors,
            'paymentStatuses' => [
                ['value' => 'pending', 'text' => 'Pending'],
                ['value' => 'success', 'text' => 'Success'],
                ['value' => 'failed', 'text' => 'Failed'],
                ['value' => 'cancelled', 'text' => 'Cancelled']
            ]
        ]);
    }

    /**
     * Store an subscription
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');
        $billingSettings = app(BillingSettings::class);
        $payment = new Payment();
        $payment->payment_id = $request->payment_id;
        $payment->currency = $request->currency;
        $payment->plan_id = (int)$request->plan_id;
        $payment->user_id = (int)$request->user_id;
        $payment->total_amount = (int)$request->total_amount;
        $payment->payment_date = Carbon::now()->toDateTimeString();
        $payment->payment_processor = 'bank';
        $payment->transaction_id = $request->transaction_id ?? null;
        $payment->reference_id = $request->reference_id ?? null;
        $payment->status = 'success';
        $payment->data = [];
        $payment->save();
        $payment->invoice_id = $billingSettings->invoice_prefix.'-'.Str::padLeft($payment->id, 5, '0');
        $payment->update();
        return response()->json([
            'success' => true,
            'payment' => fractal($payment, new PaymentDetailsTransformer())->toArray()['data'],
        ]);
    }

    /**
     * Show an payment
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $payment = Payment::find($id);
        return response()->json([
            'payment' => fractal($payment, new PaymentDetailsTransformer())->toArray()['data'],
        ]);
    }

    /**
     * Edit an payment
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $payment = Payment::find($id);
        return response()->json([
            'payment' => $payment,
        ]);
    }

    /**
     * Update an subscription
     *
     * @param UpdatePaymentRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePaymentRequest $request, $id)
    {
        if(config('tutor11.demo_mode')) {
            return redirect()->back()->with('errorMessage', 'Demo Mode! Payments can\'t be changed.');
        }

        $payment = Payment::find($id);
        $payment->update($request->validated());

        return redirect()->back()->with('successMessage', 'Payments was successfully updated!');
    }

    /**
     * Delete an payment
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(config('tutor11.demo_mode')) {
            return [
                'success' => false,
                'message' => 'Demo Mode! Payments can\'t be deleted.'
            ];
        }

        try {
            $payment = Payment::find($id);

            if(!$payment->canSecureDelete('subscription')) {
                return [
                    'success' => false,
                    'message' => 'Unable to Delete Payment! Subscription Exist.'
                ];
            } else {
                $payment->deleted_by = auth()->user()->id;
                $payment->save();
                $payment->delete();
            }
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'message' => 'Unable to Delete Payment . Something went wrong!'
            ];
        }
        return [
            'success' => true,
            'message' => 'Payment was successfully deleted!'
        ];
    }

    /**
     * Approve/Reject bank payment
     *
     * @param Request $request
     * @param $id
     * @param PaymentRepository $paymentRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authorizeBankPayment(Request $request, $id, PaymentRepository $paymentRepository)
    {
        Validator::make($request->all(), [
            'status' => ['required'],
        ])->validateWithBag('updateBankPayment');

        $payment = Payment::with(['plan', 'subscription'])->findOrFail($id);

        // Check if the subscription exists for the payment
        if($payment->subscription) {
            return redirect()->back()->with('errorMessage', 'Subscription exists for the payment.');
        }

        $payment->status = $request->status == 'approved' ? 'success' : 'cancelled';
        $payment->update();

        // if payment approved create a subscription
        try {
            if($request->status == 'approved' && $payment->status == 'success') {
                $subscription = $paymentRepository->createSubscription([
                    'payment_id' => $payment->id,
                    'plan_id' => $payment->plan_id,
                    'user_id' => $payment->user_id,
                    'category_type' => $payment->plan->category_type,
                    'category_id' => $payment->plan->category_id,
                    'duration' => $payment->plan->duration,
                    'status' => 'active'
                ]);

                // if subscription not created change payment status to pending
                if(!$subscription) {
                    $payment->status = 'pending';
                    $payment->update();
                    return redirect()->back()->with('errorMessage', 'Something went wrong. Please try again later.');
                }
            }
        } catch (\Exception $e) {
            $payment->status = 'pending';
            $payment->update();
            return redirect()->back()->with('errorMessage', 'Something went wrong. Please try again later.');
        }

        return redirect()->back()->with('successMessage', 'Payment was successfully updated!');
    }
}
