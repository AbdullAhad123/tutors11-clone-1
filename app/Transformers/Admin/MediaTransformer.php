<?php
/**
 * File name: MediaTransformer.php
 * Last modified: 11/05/21, 5:48 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\Media;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class MediaTransformer extends TransformerAbstract
{
    public function transform(Media $media)
    {
        return [
            'id' => $media->id,
            'path' => $media->path,
            'title' => $media->title,
            'created_by' => $media->created_by !== null ? User::findOrFail($media->created_by)->first_name . ' ' . User::findOrFail($media->created_by)->last_name : '--',
            'created_at' => $media->created_at->format('Y-m-d H:i:s'),
        ];
    }
}

