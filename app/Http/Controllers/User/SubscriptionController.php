<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Transformers\User\UserSubscriptionTransformer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    private $user_group_name;

    /**
     * SubscriptionController constructor.
     */
    public function __construct()
    {
        $this->middleware(['role:guest|student|employee|parent|teacher']);
        $this->user_group_name = "family";
    }

    /**
     * Get user subscriptions
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $subscriptions = Subscription::with(['plan' => function($query) {
            $query->with('features:id,code,name');
        }])->where('user_id',  auth()->user()->id)
            ->paginate(request()->perPage != null ? request()->perPage : 10);

        return Inertia::render('User/MySubscriptions', [
            'subscriptions' => fractal($subscriptions, new UserSubscriptionTransformer())->toArray(),
        ]);
    }

    /**
     * Cancel user subscription
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelSubscription($id)
    {
        if(config('tutor11.demo_mode')) {
            return redirect()->back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        $subscription = Subscription::findOrFail($id);
        $subscription->status = 'cancelled';
        $subscription->update();
        return redirect()->back()->with('successMessage', 'Subscription successfully cancelled!');
    }
}
