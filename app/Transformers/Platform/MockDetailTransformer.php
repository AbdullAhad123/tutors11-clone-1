<?php
/**
 * File name: ExamDetailTransformer.php
 * Last modified: 31/05/22, 4:15 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2022
 */

namespace App\Transformers\Platform;

use App\Models\mocks;
use League\Fractal\TransformerAbstract;

class MockDetailTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param mocks $mock
     * @return array
     */
    public function transform(mocks $mock)
    {
        $time_duration = substr($mock->total_duration/60, 0, strpos($mock->total_duration/60,'.')+2);
        return [
            'code' => $mock->code,
            'title' => $mock->title,
            'slug' => $mock->slug,
            'description' => $mock->description !== null ? $mock->description : __('No Description'),
            'paid' => $mock->is_paid,
            'redeem' => $mock->can_redeem ? $mock->points_required.' XP' : false,
            'total_questions' => $mock->total_questions,
            'total_marks' => $mock->total_marks,
            'total_duration' => $time_duration,
            'category' => $mock->subCategory->name,
            'type' => $mock->mockType->name,
            'sections' => $mock->mockSections,
            'uncompleted_sessions' => $mock->sessions_count,
            'section_lock' => $mock->settings->get('disable_section_navigation', false)
        ];
    }
}
