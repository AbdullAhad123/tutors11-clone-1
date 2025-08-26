<?php

namespace App\Transformers\Platform;

use App\Models\mock_sections;
use App\Models\SuggestedMockTest;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class MockSessionSectionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param mock_sections $section
     * @return array
     */
    public function transform(mock_sections $section)
    {
        $now = Carbon::now();
        $return = [
            'id' => $section->id,
            'sno' => $section->pivot->sno,
            'name' => $section->pivot->name,
            'section_id' => $section->pivot->section_id,
            'current_question' => $section->pivot->current_question,
            'total_questions' => $section->total_questions,
            'total_time_taken' => $section->pivot->total_time_taken,
            'status' => $section->pivot->status,
            'remainingTime' => $now->diffInSeconds($section->pivot->ends_at, false)
        ];
        if(count($SuggestedPracticeSets = SuggestedMockTest::where("user_id",auth()->user()->id)->where("mock_test_id",$section->mock->id)->get()) > 0 ){
            $return["title"] = $SuggestedPracticeSets[0]->title;
            $return["total_questions"] = $SuggestedPracticeSets[0]->total_questions;
        }
        return $return;
    }
}


?>
