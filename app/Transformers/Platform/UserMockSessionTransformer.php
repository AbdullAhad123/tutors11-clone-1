<?php
/**
 * File name: UserExamSessionTransformer.php
 * Last modified: 16/07/21, 11:36 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\mock_sessions;
use App\Models\SuggestedMockTest;
use League\Fractal\TransformerAbstract;

class UserMockSessionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param mock_sessions $session
     * @return array
     */
    public function transform(mock_sessions $session)
    {
        $result =[
            'id' => $session->code,
            'slug' => $session->mock->slug,
            'name' => $session->mock->title,
            'accuracy' => $session->results->accuracy,
            'percentage' => $session->results->percentage.'%',
            'score' => $session->results->score.'/'.$session->results->total_marks,
            'status' => $session->results->pass_or_fail,
            'completed' => $session->completed_at->toFormattedDateString()
        ];
        $SuggestedMockTest = SuggestedMockTest::where("mock_test_id",$session->mock->id)->get();
        if (count($SuggestedMockTest)>0) {
            $result["name"] =$SuggestedMockTest[0]->title;
        }
        return $result;
    }
}
