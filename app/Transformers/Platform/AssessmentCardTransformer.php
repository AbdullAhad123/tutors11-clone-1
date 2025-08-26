<?php
/**
 * File name: ExamCardTransformer.php
 * Last modified: 17/06/21, 12:41 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\AssessmentTest;
use League\Fractal\TransformerAbstract;

class AssessmentCardTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param AssessmentTest $assessment
     * @return array
     */
    public function transform(AssessmentTest $assessment)
    {
        $total_duration = substr($assessment->total_duration/60, 0, strpos($assessment->total_duration/60,'.')+2);
        return [
            'code' => $assessment->code,
            'title' => $assessment->title,
            'slug' => $assessment->slug,
            'total_questions' => $assessment->total_questions,
            'total_marks' => $assessment->total_marks,
            'total_duration' => $total_duration,
            'category' => $assessment->subCategory->name,
            'type' => $assessment->assessmentType->name,
            'redeem' => $assessment->can_redeem ? $assessment->points_required.' XP' : false,
        ];
    }
}
