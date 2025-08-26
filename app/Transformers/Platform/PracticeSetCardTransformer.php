<?php
/**
 * File name: PracticeSetCardTransformer.php
 * Last modified: 22/05/21, 12:09 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\PracticeSet;
use App\Models\SuggestedPracticeSets;
use League\Fractal\TransformerAbstract;

class PracticeSetCardTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param PracticeSet $practiceSet
     * @return array
     */
    public function transform(PracticeSet $practiceSet)
    {
        $result = [
            'id' => $practiceSet->id,
            'title' => $practiceSet->title,
            'slug' => $practiceSet->slug,
            'total_questions' => $practiceSet->total_questions,
            'skill' => $practiceSet->skill->name,
            'paid' => $practiceSet->is_paid,
        ];
        $SuggestedPracticeSets = SuggestedPracticeSets::where("user_id",auth()->user()->id)->where("practice_set_id",$practiceSet->id)->get();
        if (count($SuggestedPracticeSets)>0) {
            $result["parent_suggested"] = true;
            $result["title"] = $SuggestedPracticeSets[0]->title;
            $result["total_questions"] = $SuggestedPracticeSets[0]->total_questions;
        }else{
            $result["parent_suggested"] = false;
        }
        return $result;
    }
}
