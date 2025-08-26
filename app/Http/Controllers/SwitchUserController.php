<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGroupUsers;
use App\Models\Subscription;
use App\Models\SubCategory;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SwitchUserController extends Controller
{
    public function SwitchUser(Request $request, StatefulGuard $guard)
    {
        $data = $request->all();
        if(isset($data['reqData']['email'])){
            $user = User::where('email', $data['reqData']['email'])->first();
        } else {
            $user = User::where('user_name', $data['reqData']['user_name'])->first();
        }
        try {
            $subscription_count = Subscription::where('user_id', $user->id)->count();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {}
        $guard->logout();
        if(isset($subscription_count) && $subscription_count > 0){
            $subscription = Subscription::where('user_id', $user->id)->firstOrFail();
            $category = SubCategory::where('id', $subscription->category_id)->firstOrFail();
            Auth::setUser($user);
            $groups = auth()->user()->userGroups()->pluck('id');

            $parent_emails = [];
            foreach ($groups as $key => $group){
                $userIds = UserGroupUsers::where("user_group_id", $group)->pluck("user_id");
                $users = User::whereIn('id', $userIds)->get();
                foreach ($users as $parent_user) {
                    if ($parent_user->role_id == "parent" || $parent_user->role_id == "teacher") {
                        array_push($parent_emails, [$parent_user->first_name.' '.$parent_user->last_name => $parent_user->email]);
                    }
                }
            }            
            // foreach ($groups as $key => $group){
            //     $users = User::find(UserGroupUsers::where("user_group_id",$group )->get("user_id"));
            // }
            // $parent_emails = [];
            // foreach ($users as $key => $parent_user){
            //     if($parent_user->role_id == "parent" || $parent_user->role_id == "teacher"){
            //         array_push($parent_emails, [$parent_user->first_name.' '.$parent_user->last_name => $parent_user->email]);
            //     }
            // }
            session()->put('parent_emails', $parent_emails);
            session()->put('category_id', $category->id);
            session()->put('category_name', $category->name);
            if (auth()->check()) {
                $guard->login($user);
                return redirect('/dashboard');
            }
        } else {
            Auth::setUser($user);
            if (auth()->check()) {
                $guard->login($user);
                return redirect('/select-plan');
            }
        }
    }
}

