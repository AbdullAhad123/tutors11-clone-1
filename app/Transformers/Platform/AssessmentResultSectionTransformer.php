<?php

namespace App\Transformers\Platform;

use App\Models\AssessmentTestSections;
use League\Fractal\TransformerAbstract;

class AssessmentResultSectionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param AssessmentTestSections $section
     * @return array
     */
    public function transform(AssessmentTestSections $section)
    {
        return [
            'id' => $section->id,
            'sno' => $section->pivot->sno,
            'name' => $section->pivot->name,
            'section_id' => $section->pivot->section_id,
            'total_questions' => $section->total_questions,
            'results' => json_decode($section->pivot->results, true),
        ];
    }
}

?>
