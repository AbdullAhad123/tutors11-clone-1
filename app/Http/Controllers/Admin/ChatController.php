<?php
/**
 * File name: DashboardController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Transformers\Platform\ChatTransformer;
use App\Filters\NotificationFilters;

use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|student|parent|teacher|instructor']);
    }

    /**
     * Admin dashboard statistics
     *
     * @return \Inertia\Response
     */
    public function chat()
    {
        $raw_messages = Message::select('messages.*')
        ->whereIn('messages.id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('messages')
                ->groupBy('room_id');
        })
        ->orderBy('messages.created_at', 'desc')
        ->get();
        $chats = fractal($raw_messages, new ChatTransformer())->toArray()['data'];
        $first_room_id = Message::orderBy('created_at', 'desc')->first();
        if ($first_room_id) {
            $first_room_id = $first_room_id->only('room_id');
            $messages = fractal(Message::where("room_id", $first_room_id['room_id'])->with([
                'sender:id,first_name,last_name,profile_photo_path', 
                'receiver:id,first_name,last_name,profile_photo_path'
            ])->get(), new ChatTransformer())->toArray()['data'];
        } else {
            $first_room_id = null;
            $messages = [];
        }
        return view('Admin/Chat', [
            'chats' => $chats,
            'first_chat' => $messages
        ]);
    }
    public function getChat(Request $request, $room_id)
    {
        if(!$request->ids){
            $request->ids = array();
        }
        $messages = Message::where("room_id", $room_id)
        ->whereNotIn('id', $request->ids)
        ->with([
                'sender:id,first_name,last_name,profile_photo_path', 
                'receiver:id,first_name,last_name,profile_photo_path'
            ])
        ->get();
        if(count($messages) > 0){
            $messages_arr = fractal($messages, new ChatTransformer())->toArray()['data'];
            return [
                'success' => true,
                'message' => 'Messages have been successfully retrieved.',
                'data' => $messages_arr
            ];
        }
        return [
            'success' => false,
            'message' => 'No messages were available for this user.',
            'data' => null
        ];
    }
    public function sendChat(Request $request)
    {
        $data = [
            'sender_id' => $request->type == 'user' ? $request->user : 1,
            'receiver_id' => $request->type == 'user' ? 1 : $request->user ,
            'room_id' => "1".$request->user,
            'body' => $request->message,
            'from' => $request->type,
        ];
        Message::create($data);
        return [
            'success' => true,
            'message' => 'Message sent successfully',
        ];
    }
    public function getUser($id)
    {
        dd("getting user information");
        $user = User::findOrFail($id);
        return [
            'success' => true,
            'user' => $user
        ];
    }
}
