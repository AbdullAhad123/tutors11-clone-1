<?php

namespace App\Transformers\Admin;

use App\Models\AssessmentTestSections;
use League\Fractal\TransformerAbstract;

class AssessmentSectionTransformer extends TransformerAbstract
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
            'section_id' => $section->section->id,
            'name' => $section->name,
            'section' => $section->section->name,
            'total_questions' => $section->total_questions,
            'total_duration' => $section->total_duration / 60,
            'total_marks' => $section->total_marks,
            'section_order' => $section->section_order
        ];
    }
}
