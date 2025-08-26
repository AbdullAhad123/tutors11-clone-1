<?php
/**
 * File name: SectionTransformer.php
 * Last modified: 11/05/21, 5:48 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\ErrorLog;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class ErrorTransformer extends TransformerAbstract
{
    public function transform(ErrorLog $error)
    {
        return [
            'code' => isset(json_decode($error->context)->code) ? json_decode($error->context)->code : '--',
            'user_id' => $error->user_id ? $error->user_id . ' - ' . User::findOrFail($error->user_id)->first_name .' '. User::findOrFail($error->user_id)->last_name : '--'  ,
            'ip' => $error->ip,
            'url' => $error->url,
            'line' => $error->line,
            'filename' => $error->filename,
            'message' => $error->message,
            'date' => $error->created_at,
        ];
    }
}

