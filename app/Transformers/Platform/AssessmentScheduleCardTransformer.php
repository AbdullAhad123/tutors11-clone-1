<?php
/**
 * File name: ExamScheduleCardTransformer.php
 * Last modified: 17/07/21, 3:39 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\AssessmentTestSchedules;
use League\Fractal\TransformerAbstract;

class AssessmentScheduleCardTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param \App\Models\AssessmentTestSchedules $schedule
     * @return array
     */
    public function transform(AssessmentTestSchedules $schedule)
    {
        $total_duration = substr($schedule->assessment->total_duration/60, 0, strpos($schedule->assessment->total_duration/60,'.')+2);
        return [
            'code' => $schedule->code,
            'scheduleType' => ucfirst($schedule->schedule_type),
            'starts_at' => $schedule->starts_at_formatted,
            'ends_at' => $schedule->ends_at_formatted,
            'timezone' => $schedule->timezone,
            'title' => $schedule->assessment->title,
            'slug' => $schedule->assessment->slug,
            'total_questions' => $schedule->assessment->total_questions,
            'total_marks' => $schedule->assessment->total_marks,
            'total_duration' => $total_duration,
            'category' => $schedule->assessment->subCategory->name,
            'type' => $schedule->assessment->examType->name,
            'paid' => $schedule->assessment->is_paid,
            'redeem' => $schedule->assessment->can_redeem ? $schedule->assessment->points_required.' XP' : false,
        ];
    }
}
