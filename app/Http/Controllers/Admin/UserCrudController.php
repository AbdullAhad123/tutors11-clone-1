<?php

/**
 * File name: UserCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\UserFilters;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest; 
use App\Models\User;
use App\Models\UserGroup;
use App\Transformers\Admin\UserSearchTransformer;
use App\Transformers\Admin\UserTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Carbon\Carbon;
use DateTime;
use DB;

class UserCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin'])->except('search');
    }

    /**
     * List all users
     *
     * @param UserFilters $filters
     * @return \Inertia\Response
     */
    public function index(UserFilters $filters)
    {
        $roles = array();
        $rolesTable = DB::table('roles')->select('id', 'name')->whereNotIn('name', ['guest', 'employee', 'institute', 'candidate'])->orderBy('name')->get();
        if(count($rolesTable) > 0){
            foreach($rolesTable as $ro){
                $i = [
                    'value' => $ro->id, 
                    'text' => $ro->name
                ];
                array_push($roles, $i);
            }
        }
        $timeRanges = [
            '7d' => 'Last 7 Days',
            '15d' => 'Last 15 Days',
            '30d' => 'Last 30 Days',
            '1m' => 'Last 1 Month',
            '2m' => 'Last 2 Months',
            '3m' => 'Last 3 Months',
            '6m' => 'Last 6 Months'
        ];

        return view('Admin/Users', [
            'timeRanges' => $timeRanges,
            'roles' => $roles,
            'users' => function () use ($filters) {
                return fractal(
                    User::with('roles:id,name')->filter($filters)
                        ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new UserTransformer()
                )->toArray();
            },
            'userGroups' => UserGroup::select(['id', 'name'])->active()->get()
        ]);
    }

    /**
     * Search users api endpoint
     *
     * @param Request $request
     * @param UserFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, UserFilters $filters)
    {
        $not = $request->get('notIds');
        $query = $request->get('query');
        if(isset($not) && $not){
            return response()->json([
                'users' => fractal(User::select(['id', 'first_name', 'last_name', 'profile_photo_path', 'last_seen'])
                    ->filter($filters)
                    ->whereNotIn('id', $not)
                    ->where('first_name', 'like', '%' . $query . '%')
                    ->orWhere('last_name', 'like', '%' . $query . '%')->limit(10)
                    ->get(), new UserSearchTransformer())
                    ->toArray()['data']
            ]);
        } else {
            return response()->json([
                'users' => fractal(User::select(['id', 'first_name', 'last_name', 'profile_photo_path', 'last_seen'])
                    ->filter($filters)
                    ->where('first_name', 'like', '%' . $query . '%')
                    ->orWhere('last_name', 'like', '%' . $query . '%')->limit(10)
                    ->get(), new UserSearchTransformer())
                    ->toArray()['data']
            ]);
        }
    }

    /**
     * Store an user
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {        
        $now = new DateTime();
        $request['email_verified_at'] = $request['email_verified_at'] == 'true' ? $now->format('Y-m-d H:i:s') : null;
        $request['is_active'] = $request['is_active'] == 'true' ? true : false;
        $request['role'] = (int)$request['role'];
        
        
        if (isset($request['user_groups'])) {
            $request['user_groups'] = (array)$request['user_groups'];
            for( $i =0; $i < count( $request['user_groups'] ); $i++ ){
                    $c[$i] = (int) $request['user_groups'][$i];
                }
            $request['user_groups'] = $c;
        } else {
            if($request['role'] == 4){
                $group_name = $request['first_name'].'_'.Str::random(11);
                $userGroup = [
                    "name" => $group_name,
                    "is_active" => true,
                    "is_private" => false
                ];
                $request['user_groups'] = UserGroup::create($userGroup);
            } else {
                $request['user_groups'] = array();
            }
        }
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'user_name' => $request['user_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'email_verified_at' => $request['email_verified_at'],  
            'is_active' => $request['is_active'],  
            'login_at' => $now->format('Y-m-d'),  
        ]);
        if ($user) {
            $user->assignRole($request['role']);
            $user->userGroups()->sync($request->user_groups);
        };

        return [
            'success' => true, 
            'message' => 'User was successfully added!'
        ];
    }


    /**
     * Show an user
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $user = User::find($id);
        return fractal($user, new UserTransformer())->toArray();
    }

    /**
     * Edit an user
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user_role = $user->getRoleIdAttribute() ? $user->getRoleIdAttribute() : null;
        $roles = array();
        $rolesTable = DB::table('roles')->select('id', 'name')->whereNotIn('name', ['guest', 'employee', 'institute', 'candidate'])->orderBy('name')->get();
        if(count($rolesTable) > 0){
            foreach($rolesTable as $ro){
                $i = [
                    'value' => $ro->id, 
                    'text' => $ro->name
                ];
                array_push($roles, $i);
            }
        }
       
        return view('Admin/Users/Update', [
            'roles' => $roles,
            'user_role' => $user_role,
            'selectedUserGroups' => $user->userGroups()->pluck('id','name'),
            'selectedUserGroupsIds' => $user->userGroups()->pluck('id'),
            'user' => $user,
            'userGroups' => UserGroup::select(['id', 'name'])->active()->get()
        ]);
    }

    /**
     * Update an user
     *
     * @param UpdateUserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $now = new DateTime();
        $user = User::find($id);
        $request['email_verified_at'] = $request['email_verified_at']=='true'?true:false;
        if(config('tutor11.demo_mode')) {
            return [
                'success' => false,
                'message' => 'Demo Mode! Users can\'t be changed.'
            ];
        }
        if($request['email_verified_at'] == true){
            $request['email_verified_at'] = $now->format('Y-m-d H:i:s');
        } else {
            $request['email_verified_at'] = null;
        }
        $request['is_active'] = $request['is_active'] == 'true' ? true : false;
        $request['role'] = (int)$request['role'];
        
        
        if (isset($request['user_groups'])) {
            $request['user_groups'] = (array)$request['user_groups'];
            for( $i =0; $i < count( $request['user_groups'] ); $i++ ){
                    $c[$i] = (int) $request['user_groups'][$i];
                }
            $request['user_groups'] = $c;
        } else {
            $request['user_groups'] = array();
        }

        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->user_name = $request['user_name'];
        $user->email = $request['email'];
        $user->is_active = $request['is_active'];
        $user->email_verified_at = $request['email_verified_at'];


        // If user is in-active, delete all sessions
        if($request['is_active'] == false) {
            if (config('session.driver') == 'database') {
                DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
                    ->where('user_id', $user->getAuthIdentifier())
                    ->delete();
            }
        }

        if($request['password'] != null || $request['password'] != '') {
            $user->password = Hash::make($request['password']);
        }

        $user->save();

        $user->syncRoles($request['role']);
        $user->userGroups()->sync($request->user_groups);

        return [
            'success' => true,
            'message' => 'User was successfully updated!'
        ];
    }

    /**
     * Delete an user
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (config('tutor11.demo_mode')) {
            return [
                'success' => false,
                'message' => 'Demo Mode! Users can\'t be deleted.'
            ];
        }

        try {
            $user = User::find($id);

            if (!$user->canSecureDelete('practiceSessions', 'quizSessions')) {
                return [
                    'success' => false,
                    'message' => 'Unable to Delete User . Remove all associations and Try again!'
                ];
            }

            $user->userGroups()->detach();
            $user->roles()->detach();
            $user->secureDelete('practiceSessions', 'quizSessions');
        } catch (\Illuminate\Database\QueryException $e) {
            return [
                'success' => false,
                'message' => 'Unable to Delete User . Remove all associations and Try again!'
            ];
        }
        return [
            'success' => true,
            'message' => 'User was successfully deleted!'
        ];
    }

    public function adminUserLogin($id, Request $request, StatefulGuard $guard)
    {
        $user = User::find($id);
        if ($user) {
            $return_data = [
                'success' => false,
                'url' => route('welcome'),
            ];
            $role = $user->getRoleNames()->first();
            $guard->logout();
            Auth::setUser($user);
            if (auth()->check()) {
                $guard->login($user);
                $return_data['success'] = true;
                if ($role == 'admin') {
                    $return_data['url'] = route('admin_dashboard');
                } elseif ($role == 'student') {
                    $return_data['url'] = route('user_dashboard');
                } elseif ($role == 'instructor') {
                    $return_data['url'] = route('instructor_dashboard');
                } elseif ($role == 'parent' || $role == 'teacher') {
                    $return_data['url'] = route('change_child');
                } else {
                    $return_data['url'] = route('user_dashboard');
                }
            }
            return $return_data;
        }
    }

    public function userChartReport(Request $request)
    {
        $days = $request->days;
        $chartData = [];

        for ($i = 0; $i < $days; $i++) {
            $date = Carbon::today()->subDays($i);
            $count = User::whereDate('created_at', $date->toDateString())->count();
            $chartData[] = [
                'date' => $date->timestamp * 1000, // Convert to milliseconds
                'value' => $count,
            ];
        }
        return response()->json($chartData);
    }
}
