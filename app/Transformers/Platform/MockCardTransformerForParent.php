<?php
/**
 * File name: ExamCardTransformer.php
 * Last modified: 17/06/21, 12:41 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\mocks;
use App\Models\SuggestedMockTest;
use League\Fractal\TransformerAbstract;

class MockCardTransformerForParent extends TransformerAbstract
{

    /**
     * A Fractal transformer.
     *
     * @param mocks $mock
     * @return array
     */
    public function transform(mocks $mock)
    {
        $total_duration = substr($mock->total_duration/60, 0, strpos($mock->total_duration/60,'.')+2);
        $return =  [
            'id' => $mock->id,
            'code' => $mock->code,
            'title' => $mock->title,
            'slug' => $mock->slug,
            'total_questions' => $mock->total_questions,
            'total_marks' => $mock->total_marks,
            'total_duration' => $total_duration,
            'category' => $mock->subCategory->name,
            'type' => $mock->mockType->name,
            'redeem' => $mock->can_redeem ? $mock->points_required.' XP' : false,
        ];
        if(count(SuggestedMockTest::where("user_id",auth()->user()->roles[0]->name!="parent"?auth()->user()->id:session("selected_child")["id"])->where("mock_test_id",$mock->id)->get()) > 0 ){
            $return["already_set"] = true;
        }else{
            $return["already_set"] = false;
        }
        return $return;
    }
}
