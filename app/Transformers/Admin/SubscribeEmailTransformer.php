<?php
/**
 * File name: SubscribeEmailTransformer.php
 * Last modified: 11/05/21, 5:48 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\SubscribeEmail;
use League\Fractal\TransformerAbstract;

class SubscribeEmailTransformer extends TransformerAbstract
{
    public function transform(SubscribeEmail $user)
    {
        return [
            'id' => $user->id,
            'email' => $user->email,
            'created_at' => $user->created_at ? $user->created_at->format('d, M Y h:i A') : '--',
        ];
    }
}

