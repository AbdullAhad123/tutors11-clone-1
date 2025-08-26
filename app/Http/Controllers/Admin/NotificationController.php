<?php
/**
 * File name: DashboardController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Notification;
use App\Models\ReadNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transformers\Admin\UserTransformer;
use App\Transformers\Admin\NotificationCardTransformer;
use App\Filters\NotificationFilters;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|teacher|parent|student']);
    }

    /**
     * Admin dashboard statistics
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return view('Admin/Notification/Create', [
            'roles' => [
                ['value' => 1, 'text' => 'Admin'],
                ['value' => 2, 'text' => 'Instructor'],
                ['value' => 3, 'text' => 'Student'],
                ['value' => 4, 'text' => 'Parent'],
                ['value' => 9, 'text' => 'Teacher'],
            ],
            'users' => User::with(['roles:id,name'])
            ->active()
            ->whereDoesntHave('roles', function ($query) {
                $query->where('id', 1); // id 1 refers to admin role not selecting admin users
            })
            ->get(['id', 'first_name', 'last_name']),
        ]);
    }
    public function send(Request $request)
    {
        $data = $request->all();
        $data['sms_alert'] = $request->sms_alert == 'true' ? true : false;
        $data['email_alert'] = $request->email_alert == 'true' ? true : false;
        $data['by_role_group'] = $request->by_role_group == 'true' ? true : false;
        $data['selected_users'] = isset($request->selected_users) ? $request->selected_users : [];
        if($data['by_role_group']){
            $selectedRoles = isset($request->selected_user_roles) ? $request->selected_user_roles : [];
            $usersWithSelectedRoles = User::whereHas('roles', function ($query) use ($selectedRoles) {
                $query->whereIn('id', $selectedRoles);
            })->pluck('id');
            $notification = new Notification;
            $notification->title = $request->title;
            $notification->message = $request->message;
            $notification->sms = $data['sms_alert'];
            $notification->email = $data['email_alert'];
            $notification->user_ids = json_encode($usersWithSelectedRoles);
            $notification->save();
            $read_notification = new ReadNotification;
            $read_notification->notification_id = $notification->id;
            $read_notification->user_ids = json_encode([]);
            $read_notification->save();
            return [
                'success' => true
            ];
        } else {
            $notification = new Notification;
            $notification->title = $request->title;
            $notification->message = $request->message;
            $notification->sms = $data['sms_alert'];
            $notification->email = $data['email_alert'];
            $notification->user_ids = json_encode(array_map('intval', $data['selected_users']));
            $notification->save();
            $read_notification = new ReadNotification;
            $read_notification->notification_id = $notification->id;
            $read_notification->user_ids = json_encode([]);
            $read_notification->save();
            return [
                'success' => true
            ];
        }
    }
    public function read($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            $read = ReadNotification::where('notification_id', $id)->first();
            $user_id = Auth::user()->id;
            $decode = json_decode($read->user_ids);
            array_push($decode, $user_id);
            $read->user_ids = json_encode($decode);
            $read->save();
            return [
                'success' => true
            ];
        } else {
            return [
                'success' => false
            ];
        }
    }
    public function show(NotificationFilters $filters)
    {
        $notifications = function () use ($filters) {
            return fractal(Notification::filter($filters)
                ->orderBy('id', 'desc')
                ->paginate(request()->perPage != null ? request()->perPage : 10),
                new NotificationCardTransformer())->toArray();
        };
        return view('Admin/Notification/Show', [
            'notifications_data' => $notifications,
        ]);
    }
    public function delete($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->delete();
            ReadNotification::where('notification_id', $id)->delete();
            return [
                'success' => true,
                'message' => 'Notification deleted successfully.',
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Notification does not exists!',
            ];
        }
    }
}
