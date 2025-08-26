<?php
/**
 * File name: ExamDetailTransformer.php
 * Last modified: 31/05/22, 4:15 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2022
 */

namespace App\Transformers\Platform;

use App\Models\AssessmentTest;
use League\Fractal\TransformerAbstract;

class AssessmentDetailTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param AssessmentTest $assessment
     * @return array
     */
    public function transform(AssessmentTest $assessment)
    {
        $time_duration = substr($assessment->total_duration/60, 0, strpos($assessment->total_duration/60,'.')+2);
        return [
            'code' => $assessment->code,
            'title' => $assessment->title,
            'slug' => $assessment->slug,
            'description' => $assessment->description !== null ? $assessment->description : __('No Description'),
            'paid' => $assessment->is_paid,
            'redeem' => $assessment->can_redeem ? $assessment->points_required.' XP' : false,
            'total_questions' => $assessment->total_questions,
            'total_marks' => $assessment->total_marks,
            'total_duration' => $time_duration,
            'category' => $assessment->subCategory->name,
            'type' => $assessment->examType->name,
            'sections' => $assessment->examSections,
            'uncompleted_sessions' => $assessment->sessions_count,
            'section_lock' => $assessment->settings->get('disable_section_navigation', false)
        ];
    }
}
