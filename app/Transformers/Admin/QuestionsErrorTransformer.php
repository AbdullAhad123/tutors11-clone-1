<?php
/**
 * File name: SectionTransformer.php
 * Last modified: 11/05/21, 5:48 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\QuestionsErrorLog;
use App\Models\Question;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class QuestionsErrorTransformer extends TransformerAbstract
{
    public function transform(QuestionsErrorLog $error)
    {   
        return [
            'ip' => $error->ip,
            'question_code' => Question::find($error->question_id) ? Question::find($error->question_id)->code : '--',
            'url' => $error->url,
            'message' => $error->message,
            'question_id' => $error->question_id,
            'user_id' => $error->user_id ? $error->user_id . ' - ' . User::find($error->user_id)->first_name .' '. User::find($error->user_id)->last_name : '--'  ,
            'is_index_question' => $error->is_index_question,
            'date' => $error->created_at,
        ];
    }
}

