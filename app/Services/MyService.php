<?php

namespace App\Services;

use App\Models\PracticeSession;
use App\Models\JourneySession;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAvatar;
use App\Models\Avatar;
use App\Models\UserGroupUsers;
use App\Models\User;

class MyService
{
    public function getTotalCoins()
    {
        // $pointsArr = [];
        // $students = User::whereHas('roles', function ($query) {
        //     $query->where('name', 'student');
        // })->get();
        
        // foreach ($students as $student) {
        //     $total_coins = 0;
        //     $total_coins = PracticeSession::where('user_id', $student->id)->sum('total_points_earned') + JourneySession::where('user_id', $student->id)->sum('total_points_earned');
        //     $user_avatars = UserAvatar::where('user', $student->id)->with('avatar')->get();

        //     $pointsSum = $user_avatars->sum(function ($item) {
        //         $avatar = Avatar::findOrFail($item->avatar);
        //         return $avatar->points;
        //     });
        //     if($total_coins - $pointsSum < 0){
        //         $pointsArr[$student->first_name.' '.$student->last_name] = $total_coins - $pointsSum;
        //     }
        // }


        $total_coins = 0;
        $total_coins = PracticeSession::where('user_id', Auth::user()->id)->sum('total_points_earned') + JourneySession::where('user_id', Auth::user()->id)->sum('total_points_earned');
        $user_avatars = UserAvatar::where('user', Auth::user()->id)->with('avatar')->get();

        $pointsSum = $user_avatars->sum(function ($item) {
            $avatar = Avatar::findOrFail($item->avatar);
            return $avatar->points;
        });
        return $total_coins - $pointsSum;
    }
    public function getTotalChildsCount()
    {
        $totalChlids = 0;
        $user_group_ids = auth()->user()->userGroups()->pluck("id");
        if(count($user_group_ids) > 0){
            foreach ($user_group_ids as $key2 => $value2) {
                $users = User::find(UserGroupUsers::where("user_group_id",$value2 )->get("user_id"));
            }
            foreach ($users as $value) {
                if ($value->role_id == "parent" || $value->role_id == "teacher") {continue;}
                $totalChlids += $totalChlids + 1;
            }
        }
        return $totalChlids;
    }
}