<?php
/**
 * File name: UserSearchTransformer.php
 * Last modified: 13/03/21, 4:04 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\User;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class UserSearchTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        $status = "offline";
        if($user->last_seen && $user->last_seen >= now()->subMinutes(2)){
            $status = "online";
        }
        return [
            'id' => $user->id,
            'name' => "{$user->first_name} {$user->last_name}",
            'profile_photo_path' => $user->profile_photo_path,
            'status' => $status,
        ];
    }
}
