<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\ReadNotification;

class NotificationTransformer extends TransformerAbstract
{
    public function transform(Notification $notification)
    {
        if(Auth::user()->roles->first()->name == "parent" || Auth::user()->roles->first()->name == "teacher" || Auth::user()->roles->first()->name == "student"){
            $read = ReadNotification::where('notification_id', $notification->id)->first();
            $user_read = false;
            if($read){
                $user_read = in_array(Auth::user()->id, json_decode($read->user_ids));
            }
            if (in_array(Auth::user()->id, json_decode($notification->user_ids)) && !$user_read) {
                $i = [
                    'id' => $notification->id,
                    'title' => $notification->title,
                    'message' => $notification->message,
                    'read' => $user_read,
                    'created_at' => $notification->created_at->format('Y-m-d'),
                ];
            } else {
                if (in_array(Auth::user()->id, json_decode($notification->user_ids)) && $user_read){
                    $i = [
                        'id' => $notification->id,
                        'title' => $notification->title,
                        'message' => $notification->message,
                        'read' => $user_read,
                        'created_at' => $notification->created_at->format('Y-m-d'),
                    ];
                } else {
                    $i = [];
                }
            }
            return $i;
        } else {
            return [];
        }
    }
}
