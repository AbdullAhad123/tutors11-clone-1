<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGroupUsers;
use App\Models\UserGroup;
use App\Models\PracticeSession;
use App\Models\JourneySession;
use App\Models\Avatar;
use App\Models\UserAvatar;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Transformers\Admin\AvatarShopTransformer;
use App\Services\MyService;
use Illuminate\Support\Facades\Http;
use DateTime;
use Mail;
use Validator;
use NoCaptcha;


class AuthConroller extends Controller
{
   use AuthenticatesUsers;

    public function showLoginForm()
    {   
        session()->forget('password_recovery_email');
        session()->forget('password_recovery_email_to');
        return view('parentsidebar.login');
    }

    public function profile(MyService $myService)
    {
        $shop_avatars = fractal(Avatar::active()->orderBy('sort', 'asc')->get(), new AvatarShopTransformer())->toArray()['data'];
        
        $user_avatars = UserAvatar::join('avatars', 'users_avatars.avatar', '=', 'avatars.id')
        ->where('users_avatars.user', Auth::user()->id)
        ->where('avatars.is_active', true)
        ->select('users_avatars.id', 'users_avatars.user as user_id', 'users_avatars.avatar as avatar_id', 'users_avatars.is_selected', 'avatars.title', 'avatars.path', 'avatars.points')
        ->orderBy('avatars.sort', 'asc')
        ->get();

        if(Auth::user()->avatar_selected){
            $path = UserAvatar::join('avatars', 'users_avatars.avatar', '=', 'avatars.id')
            ->where('users_avatars.user', Auth::user()->id)
            ->where('users_avatars.is_selected', true)
            ->select('avatars.path')
            ->first();
            $profile_photo_path = $path->path;
        } else {
            $profile_photo_path = Auth::user()->profile_photo_path;
        }

        return view("Parent/Profile", [
            "user_avatars" => $user_avatars,
            "shop_avatars" => $shop_avatars,
            "total_coins" => $myService->getTotalCoins(),
            "user"=>Auth::user(),
            "id"=>Auth::user()->id,
            "first_name"=>Auth::user()->first_name,
            "last_name"=>Auth::user()->last_name,
            "user_name"=>Auth::user()->user_name,
            "email"=>Auth::user()->email,
            "preferences"=>Auth::user()->preferences,
            "email_verified_at"=>Auth::user()->email_verified_at,
            "mobile"=>Auth::user()->mobile,
            "mobile_verified_at"=>Auth::user()->mobile_verified_at,
            "verification_code"=>Auth::user()->verification_code,
            "verification_code_expires_at"=>Auth::user()->verification_code_expires_at,
            "password"=>Auth::user()->password,
            "two_factor_secret"=>Auth::user()->two_factor_secret,
            "two_factor_recovery_codes"=>Auth::user()->two_factor_recovery_codes,
            "remember_token"=>Auth::user()->remember_token,
            "current_team_id"=>Auth::user()->current_team_id,
            "profile_photo_path"=>$profile_photo_path,
            "is_active"=>Auth::user()->is_active,
            "login_at"=>Auth::user()->login_at,
            "login_at"=>Auth::user()->login_at,
            "updated_at"=>Auth::user()->updated_at,
            "deleted_at"=>Auth::user()->deleted_at
        ]);
    }


    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if ($this->attemptLogin($request)) {
    //         return $this->sendLoginResponse($request);
    //     }

    //     return $this->sendFailedLoginResponse($request);
    // }

    // protected function authenticated(Request $request, $user)
    // {
    //     return redirect('/dashboard');
    // }

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     return redirect('/login')->withErrors([
    //         'email' => 'These credentials do not match our records.',
    //     ]);
    // }

    public function handle($request, Closure $next)
{
    // Check if user is trying to access a user page and is not a user
    if (strpos($request->url(), '/dashboard') !== false && session('user_role') !== 'user') {
        return redirect('/parent/dashboard'); // Redirect to parent dashboard
    }

    return $next($request);
}

    public function login(Request $request)
    {
        $credentials = $request->only('password');
        $account = $request->input('account');
        $userField = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        $credentials[$userField] = $request->email;

        if (Auth::attempt($credentials)) {
            session()->put('user_role', auth()->user()->roles->first()->name);
            session()->put('user_account', $account);
            if(isset($request->url) && $request->url != null){
                $url = $request->url;
                return redirect()->to($url);
            }
            
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin_dashboard');
            } elseif (Auth::user()->hasRole(['guest', 'student', 'employee'])) {
                return redirect()->route('user_dashboard');
            } elseif (Auth::user()->hasRole('instructor')) {
                return redirect()->route('instructor_dashboard');
            } elseif (Auth::user()->hasRole('parent') || Auth::user()->hasRole('teacher')) {
                return redirect()->route('change_child');
            } else {
                return redirect()->route('user_dashboard');
            }
        }

        // Check if the authentication failed due to incorrect password
        if (Auth::getLastAttempted() && !Auth::getLastAttempted()->wasRecentlyCreated) {
            // Password was incorrect, handle the error accordingly
            return redirect()->back()->withErrors(['password' => __('auth.password')]);
        }

        // If neither condition is met, fall back to a generic error
        return redirect()->back()->withErrors(['email' => __('auth.failed')]);
    }
    public function resetPassword()
    {
        $email = session('password_recovery_email_to');
        // Extract the username and domain parts
        $username = substr($email, 0, 2);
        $domain = substr($email, -1); // Assuming domain always ends with '.com' (Adjust if different)

        // Calculate the length of asterisks needed
        $asterisks_length = strlen($email) - strlen($username) - strlen($domain);

        // Generate asterisks string
        $asterisks = str_repeat('*', $asterisks_length);

        // Concatenate the masked email
        $maskedEmail = $username . $asterisks . $domain;

        if(session('password_recovery_email')){
            return view('parentsidebar.resetPassword',[
                'email_to' => $maskedEmail
            ]);
        } else {
            return redirect()->route('login_identify');
        }
    }
    public function loginIdentify()
    {
        return view('parentsidebar/loginIdentify');
    }
    public function verifyLoginIdentify(Request $request)
    {
        $data = [
            'success' => false,
            'message' => 'Invalid username or email address.'
        ];
        $user = User::where('user_name', $request->user)->orWhere('email', $request->user)->first();
        if($user){
            $role = $user->getRoleNames()[0];
            $parent = '';
            if($role == 'student'){
                $group_id = UserGroupUsers::where('user_id', $user->id)->with('userGroup')->first()->user_group_id;
                $userGroupUsers = UserGroupUsers::where('user_group_id', $group_id)->with('user')->get();
                foreach ($userGroupUsers as $userGroupUser) {
                    $roleId = $userGroupUser->user->role_id; // Accessing the accessor
                    if ($roleId == "student" || $roleId == "admin" || $roleId == "instructor") {continue;}
                    if ($roleId == "parent" || $roleId == "teacher") {
                        $user_email = $userGroupUser->user->email;
                        $parent = $userGroupUser->user->first_name.' '.$userGroupUser->user->last_name;
                    }
                }
            } else if($role == 'parent' || $role == 'teacher') {
                $user_email = $user->email;
            } else {
                $data['message'] = 'Password cannot be changed for this account, please contact the administrator.';
                return $data;
            }
            if($user_email){
                session()->put('password_recovery_email', $user->email);
                session()->put('password_recovery_email_to', $user_email);
                $code = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
                $user->verification_code = $code;
                $user->save();
                Mail::send('Emails.reset_password_mail',[
                    'role' => $role,
                    'code' => $code,
                    'user' => $user->first_name.' '.$user->last_name,
                    'parent' => $parent
                ],function($messages) use ($user_email){
                    $messages->to($user_email);
                    $messages->subject('Reset your password | TutorsElevenPlus');
                });
                $data = [
                    'success' => true,
                    'message' => 'The OTP code for password recovery has been successfully sent by email.'
                ];
            } else {
                $data['message'] = 'Email address could not be located';
                return $data;
            }
        }
        return $data;
    }
    public function changePassword(Request $request)
    {
        $user = User::where('user_name', session('password_recovery_email'))->orWhere('email', session('password_recovery_email'))->first();
        if($user->verification_code == $request->code){
            $user->password = Hash::make($request->password);
            $user->save();
            return [
                'success' => true,
                'message' => 'Password recovered successfully!'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Invalid verification code, Please double-check code and try again.'
            ];
        }
    }
    public function showRegistrationForm()
    {
        if(!app(\App\Settings\SiteSettings::class)->can_register){
            return redirect()->route('userlogin');
        }
        return view('parentsidebar/register');
    }

    public function userRegister(Request $request)
    {
        $validator = $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:9',
            // 'mobile' => 'required',
            'g-recaptcha-response' => 'required', // reCAPTCHA validation
        ], [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA verification.',
            // 'mobile.required' => 'The phone number field is required.',
        ]);
        
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6LeOxk8qAAAAAKdLO_VP_KdT4_WugAuOWP6BVeU5',
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $recaptchaResponse = json_decode($response->body());

        if (!$recaptchaResponse->success) {
            return redirect()->back()->withErrors(['g-recaptcha-response' => 'ReCAPTCHA verification failed.']);
        }

        $code = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $user = $request->email;
        $data = [
            'code' => $code,
            'user' => $request->first_name.' '.$request->last_name,
        ];
        Mail::send('Emails.verification_code_mail',$data,function($messages) use ($user){
            $messages->to($user);
            $messages->subject('Email Verification Code');
        });

        try {
            $now = new DateTime();
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                // 'mobile' => '+44'.$request->mobile,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'verification_code' => $code,
                'is_active' => true,  
                'login_at' => $now->format('Y-m-d'),
                'ip_address' => $request->ip(),
            ]);
            if($request->role == "teacher"){
                $role = 9;
            } else {
                $role = 4;
            }
            $user->assignRole($role);
            $group_name = $request->first_name.'_'.Str::random(11);
            $userGroup = [
                "name" => $group_name,
                "is_active" => true,
                "is_private" => true
            ];
            $parent_user_group = UserGroup::create($userGroup);
            DB::table('user_group_users')->insert([
                'user_id' => $user->id,
                'user_group_id' => $parent_user_group->id
            ]);
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('error', 'Something went Wrong!');
        }

        $credentials = $request->only('email', 'password');

        // Get the selected account from the request
        $account = $request->input('account');

        // Set the session key to a unique value for each user
        $request->session()->put('user_' . $account, Auth::attempt($credentials));

        if (Auth::check()) {
            session()->put('user_role', 'parent');
            return redirect()->intended('/create-student-account');
        }
        return redirect()->back()->withErrors(['email' => __('auth.failed')]);
    }
    public function emailVerify()
    {
        return view('Parent\VerifyEmail');
    }
    public function verifyEmailCode(Request $request)
    {
        if (strlen($request->code) < 6) {
            $success = false;
            $message = 'The verification code is incomplete. Please enter the full 6-digit code to proceed.';
        } elseif (!ctype_digit($request->code)) {
            $success = false;
            $message = 'The verification code must be a 6-digit combination of numbers.';
        }
        if(auth()->user()->verification_code == $request->code){
            $now = new DateTime();
            $user = User::find(auth()->user()->id);
            $user->email_verified_at = $now->format('Y-m-d');
            $user->save();
            $success = true;
            $message = 'Code matched!';
        } else {
            $success = false;
            $message = 'The provided verification code is invalid. Please double-check and try again.';
        }

        return [
            'success' => $success,
            'message' => $message
        ];
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
}
