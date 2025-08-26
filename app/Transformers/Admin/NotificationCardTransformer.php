<?php

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\ReadNotification;
use App\Transformers\Admin\UserReadNotificationTransformer;


class NotificationCardTransformer extends TransformerAbstract
{
    public function transform(Notification $notification)
    {
        return [
            'id' => $notification->id,
            'title' => $notification->title,
            'message' => $notification->message,
            'sms' => $notification->sms,
            'email' => $notification->email,
            'users' => fractal($notification, new UserReadNotificationTransformer())->toArray(),
            'created_at' => $notification->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
