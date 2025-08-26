<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class LoginAsParentController extends Controller
{
    public function login_as_parent(Request $request,StatefulGuard $guard)
    {
        if(isset($request->email) && isset($request->password)){
            $user = User::where('email',$request->email)->orWhere('user_name', $request->email)->first();
            $child = auth()->user();
            $parent = User::where('email',$request->email)->orWhere('user_name', $request->email)->first();
            if($parent){
                if (Hash::check($request->password, $parent->password)) {
                    session()->put('user_role', 'parent');
                    $guard->logout();
                    $guard->login($user);        
                    return redirect()->route('change_child');
                } else {
                    return redirect()->back()->with('errorMessage', 'Wrong credentials entered');
                }
            } else {
                return redirect()->back()->with('errorMessage', 'Wrong credentials entered');
            }
        } else {
            return redirect()->back()->with('errorMessage', 'Please enter all credentials');
        }
    }

}
