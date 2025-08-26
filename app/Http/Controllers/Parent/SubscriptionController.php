<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Transformers\User\UserSubscriptionTransformer;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    /**
     * SubscriptionController constructor.
     */
    public function __construct()
    {
        $this->middleware(['role:parent|teacher']);
    }

    /**
     * Get user subscriptions
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        try {
            if (session()->has("selected_child")) {
                $subscriptions = Subscription::with(['plan' => function ($query) {
                    $query->with('features:id,code,name');
                }])->where('user_id', session("selected_child")["id"])
                    ->paginate(request()->perPage != null ? request()->perPage : 10);
                $subscriptions = fractal($subscriptions, new UserSubscriptionTransformer())->toArray();
                $childName = session("selected_child")["name"];
            } else {
                $childName = '';
                $subscriptions =  ["data"=>[],"meta"=>["pagination"=>["total"=>2]]];
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $childName = '';
            $subscriptions =  ["data"=>[],"meta"=>["pagination"=>["total"=>2]]];
        }

        return view('User/MySubscriptions', [
            'subscriptions' => $subscriptions,
            "childName" => $childName
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
        if (config('tutor11.demo_mode')) {
            return redirect()->back()->with('errorMessage', 'Demo Mode! These settings can\'t be changed.');
        }

        $subscription = Subscription::findOrFail($id);
        $subscription->status = 'cancelled';
        $subscription->update();
        return redirect()->back()->with('successMessage', 'Subscription successfully cancelled!');
    }
}
