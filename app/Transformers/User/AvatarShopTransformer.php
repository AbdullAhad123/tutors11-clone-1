<?php
/**
 * File name: AvatarShopTransformer.php
 * Last modified: 11/05/21, 5:48 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\Avatar;
use App\Models\UserAvatar;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Auth;

class AvatarShopTransformer extends TransformerAbstract
{
    public function transform(Avatar $avatar)
    {
        return [
            'id' => $avatar->id,
            'title' => $avatar->title,
            'path' => $avatar->path,
            'points' => $avatar->points,
            'status' => UserAvatar::where(['user' => Auth::user()->id, 'avatar' => $avatar->id])->count() > 0 ? "Owned" : "Available",
            // 'description' => $avatar->description ? $avatar->description : '--',
            // 'is_active' => $avatar->is_active,
            // 'created_by' => $avatar->user->first_name .' '. $avatar->user->last_name,
            'created_at' => $avatar->created_at->format('Y-m-d H:i:s'),
        ];
    }
}

