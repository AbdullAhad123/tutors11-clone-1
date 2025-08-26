<?php
/**
 * File name: UserTransformer.php
 * Last modified: 21/06/21, 5:42 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        $groups = [];
        if(count($user->userGroups) > 0){
            foreach($user->userGroups as $group){
                $userGroup = [
                    'id' => $group->id,
                    'name' => $group->name,
                    'is_active' => $group->is_active
                ];
                array_push($groups, $userGroup);
            }
        }
        
        return [
            'id' => $user->id,
            'fullName' => $user->first_name.' '.$user->last_name,
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'mobile' => $user->mobile,
            'userName' => $user->user_name,
            'email' => $user->email,
            'role' => implode(",", $user->getRoleNames()->toArray()),
            'status' => $user->is_active,
            'last_seen' => $user->last_seen,
            'profile_photo_path' => $user->profile_photo_path ? '/'.$user->profile_photo_path : 'https://cdn-icons-png.flaticon.com/128/847/847969.png',
            'groups' => $groups,
            'ip_address' => $user->ip_address,
        ];
    }
}
