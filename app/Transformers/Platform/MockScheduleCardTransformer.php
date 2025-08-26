<?php
/**
 * File name: ExamScheduleCardTransformer.php
 * Last modified: 17/07/21, 3:39 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\mock_Schedules;
use App\Models\SuggestedMockTest;
use League\Fractal\TransformerAbstract;

class MockScheduleCardTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param mock_Schedules $schedule
     * @return array
     */
  
    public function transform(mock_Schedules $schedule)
    {
        $total_duration = substr($schedule->mock->total_duration/60, 0, strpos($schedule->mock->total_duration/60,'.')+2);
        $return =  [
            'id' => $schedule->mock->id,
            'code' => $schedule->code,
            'scheduleType' => ucfirst($schedule->schedule_type),
            'starts_at' => $schedule->starts_at_formatted,
            'ends_at' => $schedule->ends_at_formatted,
            'timezone' => $schedule->timezone,
            'title' => $schedule->mock->title,
            'slug' => $schedule->mock->slug,
            'total_questions' => $schedule->mock->total_questions,
            'total_marks' => $schedule->mock->total_marks,
            'total_duration' => $total_duration,
            'category' => $schedule->mock->subCategory->name,
            'type' => $schedule->mock->mockType->name,
            'paid' => $schedule->mock->is_paid,
            'redeem' => $schedule->mock->can_redeem ? $schedule->mock->points_required.' XP' : false,
        ];
        if(count(SuggestedMockTest::where("user_id",auth()->user()->id)->where("mock_test_id",$schedule->mock->id)->get()) > 0 ){
            $return["parent_suggested"] = true;
        }else{
            $return["parent_suggested"] = false;
        }
        return $return;
    }
}
