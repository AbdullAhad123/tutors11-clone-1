<?php

namespace App\Transformers\Platform;

use App\Models\Message;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class ChatTransformer extends TransformerAbstract
{

    public function transform(Message $message)
    {
        $user_id = $message->from == 'user' ?  $message->sender->id : $message->receiver->id;
        return [
            'id' => $message->id,
            'room_id' => $message->room_id,
            'body' => $message->body,
            'from' => $message->from,
            'sender' => [
                'id' => $message->sender->id,
                'name' => $message->sender->first_name . ' ' . $message->sender->last_name,
                'image' => $message->sender->profile_photo_path,
            ],
            'receiver' => [
                'id' => $message->receiver->id,
                'name' => $message->receiver->first_name . ' ' . $message->receiver->last_name,
                'image' => $message->receiver->profile_photo_path,
            ],
            'user' => [
                'id' => $message->from == 'user' ?  $message->sender->id : $message->receiver->id,
                'name' => $message->from == 'user' ?  $message->sender->first_name . ' ' . $message->sender->last_name : $message->receiver->first_name . ' ' . $message->receiver->last_name,
                'image' => $message->from == 'user' ?  $message->sender->profile_photo_path : $message->receiver->profile_photo_path,
                'status' => User::findOrfail($user_id)->only('last_seen'),
            ],
            'date' => $message->created_at->format('d-M-Y'),
        ];
    }
}
