<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGroupUsers;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use DateTime;

class AddStudentToGroup extends Controller
{
    public $include_in_user_group_name;
    public function __construct()
    {
        $this->middleware(['role:parent|teacher', 'verified']);
        $this->include_in_user_group_name = "family"; # Note this match case-insensitive
    }
    public function index()
    {
        return view('Parent/AddStudentToGroup', [
            'test' => 'test',
        ]);
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Please enter a username or email.',
            'password.required' => 'Please enter a password.',
        ]);

        $user = User::where('user_name', $request->username)->orWhere('email', $request->username)->first();

        if (!$user) {
            $errorMessage = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $errorMessage .= 'Invalid credentials. Please check your '. $errorMessage .' and try again.';
            return redirect()->back()->withErrors(['username' => $errorMessage]);
        }

        // Verify password
        if(!Hash::check($request->password, rtrim($user->password))){
            return redirect()->back()->withErrors(['password' => 'Invalid credentials. Please check password and try again.']);
        }

        $teacher_group = Auth::user()->userGroups()->first();
        $userCount = UserGroupUsers::where('user_group_id', $teacher_group->id)->where('user_id', $user->id)->count();

        if($userCount > 0){
            return redirect()->back()->withErrors(['username' => $user->first_name. ' ' . $user->last_name . ' is already added in your group']);
        }

        // Add the user to the teacher's group
        $teacher_group->users()->attach($user->id);



        return redirect()->route('change_child');
    }
}
