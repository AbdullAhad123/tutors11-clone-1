<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notification;
use App\Models\ReadNotification;
use App\Transformers\Admin\UserReadNotificationTransformer;


class UserReadNotificationTransformer extends TransformerAbstract
{
    public function transform(Notification $notification)
    {
        $user_array = [];
        foreach(json_decode($notification->user_ids) as $userId){
            $user = User::findOrFail($userId)->only('id', 'first_name', 'last_name');
            $read = ReadNotification::where('notification_id', $notification->id)->first();
            $user_read = in_array($userId, json_decode($read->user_ids));
            $i = [
                'id' => $user['id'],
                'name' => $user['first_name'] .' '. $user['last_name'],
                'read' => $user_read
            ];
            array_push($user_array, $i);
        }
        usort($user_array, function ($a, $b) {
            return strcmp($a["name"], $b["name"]);
        });
        return $user_array;
    }
}
