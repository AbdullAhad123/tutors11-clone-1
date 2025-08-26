<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Platform\CheckoutProcessRequest;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Feature;
use App\Models\SubCategory;
use App\Models\UserGroupUsers;
use App\Repositories\CheckoutRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\RazorpayRepository;
use App\Repositories\StripeRepository;
use App\Settings\BankSettings;
use App\Settings\PaymentSettings;
use App\Settings\RazorpaySettings;
use App\Settings\StripeSettings;
use App\Settings\BillingSettings;
use App\Settings\HomePageSettings;
use App\Settings\SiteSettings;
use App\Transformers\Platform\PricingTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    /**
     * @var CheckoutRepository
     */
    private CheckoutRepository $repository;
    /**
     * @var PaymentRepository
     */
    private PaymentRepository $paymentRepository;
    /**
     * @var PaymentSettings
     */
    private PaymentSettings $paymentSettings;

    public function __construct(CheckoutRepository $repository, PaymentRepository $paymentRepository, PaymentSettings $paymentSettings)
    {
        $this->repository = $repository;
        $this->paymentRepository = $paymentRepository;
        $this->paymentSettings = $paymentSettings;
    }

    /**
     * Plan checkout page
     *
     * @param Request $request
     * @param $plan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function checkout(Request $request, $plan)
    {
        $test = $this->repository->getPaymentProcessors();
        $plan = Plan::with('category:id,name')->where('code', '=', $plan)->firstOrFail();
        return view('store.checkout.index', [
            'plan' => $plan->code,
            'billing_information' => $request->user()->preferences->get('billing_information', []),
            'payment_id' => 'payment_'.Str::random(16),
            'order' => $this->repository->orderSummary($plan),
            'paymentProcessors' => $this->repository->getPaymentProcessors(),
            'countries' => isoCountries(),
            'bankSettings' => app(BankSettings::class),
        ]);
    }

    public function selectPlan(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        $monthly_count = 0;
        $yearly_count = 0;
        $features = Feature::orderBy('sort_order')->get();
        $categories = SubCategory::whereHas('plans')->with(['category:id,name', 'plans' => function($query) {
            $query->where('is_active', '=', 1)->orderBy('sort_order')->with('features');
        }])->orderBy('sub_categories.name')->get();
        $monthly_categories = SubCategory::whereHas('plans')->with(['category:id,name', 'plans' => function($query) {
            $query->where('is_active', '=', 1)->where('duration', '<', 12)->orderBy('sort_order')->with('features');
        }])->orderBy('sub_categories.name')->get();
        $yearly_categories = SubCategory::whereHas('plans')->with(['category:id,name', 'plans' => function($query) {
            $query->where('is_active', '=', 1)->where('duration', '>=', 12)->orderBy('sort_order')->with('features');
        }])->orderBy('sub_categories.name')->get();
        foreach($monthly_categories as $category){
            $monthly_count += count($category['plans']);
        }
        foreach($yearly_categories as $category){
            $yearly_count += count($category['plans']);
        }
        return view('User/SelectPlan', [
            'categories' => fractal($categories, new PricingTransformer($features))->toArray()['data'],
            'monthly_categories' => fractal($monthly_categories, new PricingTransformer($features))->toArray()['data'],
            'yearly_categories' => fractal($yearly_categories, new PricingTransformer($features))->toArray()['data'],
            'monthly_count' => $monthly_count, 
            'yearly_count' => $yearly_count,
            'selectedCategory' => $categories->count() > 0 ? $categories->first()->code : '',
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }

    /**
     * Process checkout and redirect to review & pay page
     *
     * @param CheckoutProcessRequest $request
     * @param $plan
     * @return string
     */
    public function processCheckout(CheckoutProcessRequest $request, $plan)
    {
        if(config('tutor11.demo_mode')) {
            return [
                'success' => false,
                'status' => 'demo_mode',
                'message' => 'Demo Mode! These settings can\'t be changed.',
                'url' => ''
            ];
        }

        $plan = Plan::with('category:id,name')->where('code', '=', $plan)->firstOrFail();

        // check the user has active subscription to the current plan
        $activeSubscriptions = auth()->user()->subscriptions()
            ->where('category_id', '=', $plan->category_id)
            ->where('ends_at', '>', now()->toDateTimeString())
            ->where('status', '=', 'active')
            ->count();

        if($activeSubscriptions > 0) {
            return [
                'success' => false,
                'status' => 'already_active',
                'message' => 'You already had an active subscription to '.$plan->category->name.'.',
                'url' => ''
            ];
        }

        // Check the user has pending bank payment
        if($request->user()->hasPendingBankPayment($plan->id)) {
            return [
                'success' => false,
                'status' => 'pending_bank_payment_exist',
                'message' => 'A pending bank payment request already exists for this plan.',
                'url' => ''
            ];
        }

        $orderSummary = $this->repository->orderSummary($plan);

        // Update user billing information
        $request->user()->preferences = [
            'billing_information' => [
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'zip' => $request->zip,
            ]
        ];

        $request->user()->update();
        
        if($request->payment_method == 'free' && $this->repository->orderSummary($plan)['total'] <= 0){
            return $this->handleFreePayment($request->payment_id, $plan->id, $orderSummary, $request);
        }

        if($request->payment_method == 'bank') {
            return $this->handleBankPayment($request->payment_id, $plan->id, $orderSummary);
        } elseif($request->payment_method == 'razorpay') {
            return $this->initRazorpayPayment($request->payment_id, $plan->id, $orderSummary);
        } elseif($request->payment_method == 'stripe') {
            return $this->initStripePayment($request->payment_id, $plan->id, $orderSummary);
        }

        return [
            'success' => false,
            'status' => 'unsupported_payment_method',
            'message' => 'Unsupported payment method!',
            'url' => ''
        ];
    }

    /**
     * Initiate Razorpay Payment
     *
     * @param $paymentId
     * @param $planId
     * @param $orderSummary
     * @return string
     */
    public function initRazorpayPayment($paymentId, $planId, $orderSummary)
    {
        $repository = app(RazorpayRepository::class);
        $order = null;

        // Create payment record and razorpay order
        try {
            $order = $repository->createOrder($paymentId, $orderSummary['total'] * 100);
            $payment = $this->paymentRepository->createPayment([
                'payment_id' => $paymentId,
                'currency' => $this->paymentSettings->default_currency,
                'plan_id' => $planId,
                'user_id' => request()->user()->id,
                'payment_date' => Carbon::now()->toDateTimeString(),
                'payment_processor' => 'razorpay',
                'reference_id' => $order['id'],
                'total_amount' => $orderSummary['total'],
                'billing_information' => request()->user()->preferences->billing_information,
                'status' => 'pending',
                'order_summary' => $orderSummary
            ]);
            if(!$payment) {
                return [
                    'success' => false,
                    'status' => 'something_went_wrong',
                    'message' => 'Something went wrong. Please try again.',
                    'url' => ''
                ];
            }
        } catch (\Exception $e) {
            Log::channel('daily')->error($e->getMessage());
            return [
                'success' => false,
                'status' => 'payment_failed',
                'message' => 'Payment failed!',
                'url' => '/payment-failed'
            ];
        }

        return view('store.checkout.razorpay', [
            'order_id' => $order['id'],
            'order_currency' => $order['currency'],
            'order_total' => $order['amount'],
            'razorpay_key' => app(RazorpaySettings::class)->key_id,
            'billing_information' => request()->user()->preferences->get('billing_information', []),
            'order' => $orderSummary,
        ]);
    }

    /**
     * Initiate Stripe Payment
     *
     * @param $paymentId
     * @param $planId
     * @param $orderSummary
     * @return string
     */
    public function initStripePayment($paymentId, $planId, $orderSummary)
    {
        $repository = app(StripeRepository::class);
        $group_id = UserGroupUsers::where('user_id', Auth::user()->id)->with('userGroup')->first()->user_group_id;
        $userGroupUsers = UserGroupUsers::where('user_group_id', $group_id)->with('user')->get();

        $parent_email = $userGroupUsers
            ->reject(function ($userGroupUser) {
                return in_array($userGroupUser->user->role_id, ['student', 'admin', 'instructor']);
            })
            ->first(function ($userGroupUser) {
                return in_array($userGroupUser->user->role_id, ['parent', 'teacher']);
            })
            ->user
            ->email ?? '';

        $session = $repository->createSession($paymentId, $orderSummary['total'] * 100, $planId, Auth::user()->id, $parent_email, $orderSummary);
        return [
            'success' => true,
            'status' => 'redirect_stripe_checkout',
            'message' => 'Redirect to stripe checkout',
            'url' => $session
        ];
       
        // try {
            
            
        // } catch (\Exception $e) {
        //     Log::channel('daily')->error($e->getMessage());
        //     return [
        //         'success' => false,
        //         'status' => 'payment_failed',
        //         'message' => 'Payment failed!',
        //         'url' => '/payment-failed'
        //     ];
        // }

        return view('store.checkout.razorpay', [
            'order_id' => $order['id'],
            'order_currency' => $order['currency'],
            'order_total' => $order['amount'],
            'razorpay_key' => app(RazorpaySettings::class)->key_id,
            'billing_information' => request()->user()->preferences->get('billing_information', []),
            'order' => $orderSummary,
        ]); 
    }

    /**
     * Handle Razorpay Payment
     *
     * @param Request $request
     * @param RazorpayRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleRazorpayPayment(Request $request, RazorpayRepository $repository)
    {
        $validator = Validator::make($request->all(), [
            'razorpay_signature' => 'required',
            'razorpay_payment_id' => 'required',
            'razorpay_order_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('payment_failed');
        }

        try {
            $verified = $repository->verifyPayment([
                'razorpay_signature' => $request->get('razorpay_signature'),
                'razorpay_payment_id' => $request->get('razorpay_payment_id'),
                'razorpay_order_id' => $request->get('razorpay_order_id')
            ]);
            if($verified) {
                $payment = Payment::with(['plan', 'subscription'])->where('reference_id', '=', $request->get('razorpay_order_id'))->first();

                // check if payment has been process previously
                if($payment->status == 'success' || $payment->status == 'failed'  || $payment->status == 'cancelled') {
                    return redirect()->back()->with('errorMessage', 'Payment already completed or cancelled.');
                }

                //else update payment status and razorpay data
                $payment->transaction_id = $request->get('razorpay_payment_id');
                $payment->data->set([
                    'razorpay' => $validator->validated()
                ]);
                $payment->payment_date = Carbon::now()->toDateTimeString();
                $payment->status = 'success';
                $payment->update();

                // create if subscription not exists for the payment
                if(!$payment->subscription) {
                    $subscription = $this->paymentRepository->createSubscription([
                        'payment_id' => $payment->id,
                        'plan_id' => $payment->plan_id,
                        'user_id' => $payment->user_id,
                        'category_type' => $payment->plan->category_type,
                        'category_id' => $payment->plan->category_id,
                        'duration' => $payment->plan->duration,
                        'status' => 'active'
                    ]);
                }

                return redirect()->route('payment_success');
            } else {
                return redirect()->route('payment_failed');
            }
        } catch (\Exception $e) {
            Log::channel('daily')->error($e->getMessage());
            return redirect()->route('payment_failed');
        }
    }

    public function handleFreePayment($paymentId, $planId, $orderSummary,Request $request)
    {
        $billingSettings = app(BillingSettings::class);
        $payment = new Payment();
        $payment->payment_id = $paymentId;
        $payment->currency = 'GBP';
        $payment->plan_id = $planId;
        $payment->user_id = auth()->user()->id;
        $payment->total_amount = $orderSummary['total'];
        $payment->payment_date = Carbon::now()->toDateTimeString();
        $payment->payment_processor = $request->payment_method;
        $payment->transaction_id = null;
        $payment->reference_id = null;
        $payment->status = 'success';
        $payment->data = [
            'order_summary' => $orderSummary
        ];
        $payment->save();

        $payment->invoice_id = $billingSettings->invoice_prefix.'-'.Str::padLeft($payment->id, 5, '0');
        $payment->update();
        $subscription = new Subscription();
        $subscription->plan_id = $payment->plan->id;
        $subscription->payment_id = $payment->id;
        $subscription->user_id = $payment->user_id;
        $subscription->category_type = $payment->plan->category_type;
        $subscription->category_id = $payment->plan->category_id;
        $subscription->starts_at = Carbon::now()->toDateTimeString();
        $subscription->ends_at = Carbon::now()->addMonths($payment->plan->duration)->toDateTimeString();
        $subscription->status = 'active';
        $subscription->save();

        return [
            'success' => true,
            'status' => 'payment_success',
            'message' => 'Congratulations! successfully obtained a free subscription, Please login again to use free subscription',
            'url' => '/dashboard?success=true'
        ];
    }

    /**
     * Handle Bank Payment
     *
     * @param $paymentId
     * @param $planId
     * @param $orderSummary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleBankPayment($paymentId, $planId, $orderSummary)
    {
        try {
            $payment = $this->paymentRepository->createPayment([
                'payment_id' => $paymentId,
                'currency' => $this->paymentSettings->default_currency,
                'plan_id' => $planId,
                'user_id' => request()->user()->id,
                'payment_date' => Carbon::now()->toDateTimeString(),
                'payment_processor' => 'bank',
                'total_amount' => $orderSummary['total'],
                'billing_information' => request()->user()->preferences->billing_information,
                'status' => 'pending',
                'order_summary' => $orderSummary
            ]);
            if(!$payment) {
                return [
                    'success' => false,
                    'status' => 'payment_failed',
                    'message' => 'Payment failed!',
                    'url' => '/payment-failed'
                ];
            }
        } catch (\Exception $e) {
            Log::channel('daily')->error($e->getMessage());
            return [
                'success' => false,
                'status' => 'something_went_wrong',
                'message' => 'Something went wrong. Please try again.',
                'url' => ''
            ];
        }
        return [
            'success' => false,
            'status' => 'payment_pending',
            'message' => 'Payment pending!',
            'url' => '/payment-pending'
        ];
    }

    /**
     * stripeWebhook
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function stripeWebhook()
    {
        $endpoint_secret = app(\App\Settings\StripeSettings::class)->webhook_secret;
        $secret_key = app(\App\Settings\StripeSettings::class)->secret_key;
        $api_key = app(\App\Settings\StripeSettings::class)->api_key;
        $stripe = new \Stripe\StripeClient($secret_key);

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
        } catch(\UnexpectedValueException $e) {
            return response()->json(['success' => false], 400);
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['success' => false], 400);
        }

        // Handle the event
        switch ($event->type) {
        case 'payment_intent.succeeded':
            $session = $event->data->object;
            $sessionId = $session->id;
            $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');
            $billingSettings = app(BillingSettings::class);
            $payment = new Payment();
            $payment->payment_id = $session->metadata->payment_id;
            $payment->currency = $session->metadata->currency;
            $payment->plan_id = (int)$session->metadata->plan_id;
            $payment->user_id = (int)$session->metadata->user_id;
            $payment->total_amount = $session->amount/100;
            $payment->payment_date = Carbon::now()->toDateTimeString();
            $payment->payment_processor = 'stripe';
            $payment->transaction_id = $sessionId ?? null;
            $payment->reference_id = $sessionId ?? null;
            $payment->status = 'success';
            $payment->data = [
                'order_summary' => $session->metadata->order_summary
            ];
            $payment->save();

            $payment->invoice_id = $billingSettings->invoice_prefix.'-'.Str::padLeft($payment->id, 5, '0');
            $payment->update();
            $subscription = new Subscription();
            $subscription->plan_id = $payment->plan->id;
            $subscription->payment_id = $payment->id;
            $subscription->user_id = $payment->user_id;
            $subscription->category_type = $payment->plan->category_type;
            $subscription->category_id = $payment->plan->category_id;
            $subscription->starts_at = Carbon::now()->toDateTimeString();
            $subscription->ends_at = Carbon::now()->addMonths($payment->plan->duration)->toDateTimeString();
            $subscription->status = 'active';
            $subscription->save();
        default:
            
        }
        return response()->json(['success' => true], 200);
    }

    public function paymentSuccess()
    {
        return view('store.checkout.payment_success');
    }

    public function paymentPending()
    {
        return view('store.checkout.payment_pending');
    }

    public function paymentCancelled()
    {
        return view('store.checkout.payment_cancelled');
    }

    public function paymentFailed()
    {
        return view('store.checkout.payment_failed');
    }
}
