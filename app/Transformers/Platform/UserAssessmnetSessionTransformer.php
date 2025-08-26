<?php
/**
 * File name: UserPracticeSessionTransformer.php
 * Last modified: 16/07/21, 11:36 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\AssessmentTestSession;
use League\Fractal\TransformerAbstract;

class UserAssessmnetSessionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param AssessmentTestSession $session
     * @return array
     */
    public function transform(AssessmentTestSession $session)
    {
        return [
            'id' => $session->code,
            'slug' => $session->assessment->slug,
            'name' => $session->assessment->title,
            'completed' => $session->completed_at->toFormattedDateString(),
            'percentage' => $session->results->percentage
        ];
    }
}
