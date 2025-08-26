<?php
/**
 * File name: PracticeSessionCardTransformer.php
 * Last modified: 15/06/21, 6:00 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\User;
use App\Models\PracticeSession;
use App\Models\SuggestedMockTest;
use App\Models\SuggestedPracticeSets;
use League\Fractal\TransformerAbstract;

class PracticeSessionCardTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param PracticeSession $session
     * @return array
     */
    public function transform(PracticeSession $session)
    {
        if ($session->practiceSet === null) {
            return [];
        }
        $return = [
            'code' => $session->code,
            'title' => $session->practiceSet->title,
            'slug' => $session->practiceSet->slug,
            'total_questions' => $session->practiceSet->total_questions,
            'skill' => $session->practiceSet->skill->name,
            'percentage_completed' => round($session->percentage_completed, 0),
            'set_by' => $session->practiceSet->set_by !== null ? User::findOrFail($session->practiceSet->set_by)->first_name : null,
        ];
        if(count($SuggestedPracticeSets = SuggestedPracticeSets::where("user_id",auth()->user()->id)->where("practice_set_id",$session->practiceSet->id)->get()) > 0 ){
            $return["parent_suggested"] = TRUE;
            $return["title"] = $SuggestedPracticeSets[0]->title;
            $return["parent_suggested_id"] = $SuggestedPracticeSets[0]->id;
            $return["total_questions"] = $SuggestedPracticeSets[0]->total_questions;
        }else{
            $return["parent_suggested"] = False;
        }
        return $return;
    }
}
