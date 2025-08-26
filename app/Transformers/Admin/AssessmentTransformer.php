<?php

namespace App\Transformers\Admin;

use App\Models\AssessmentTest;
use League\Fractal\TransformerAbstract;

class AssessmentTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param AssessmentTest $assessment
     * @return array
     */
    public function transform(AssessmentTest $assessment)
    {
        return [
            'id' => $assessment->id,
            'title' => $assessment->title,
            'code' => $assessment->code,
            'category' => $assessment->subCategory->name,
            'section' => $assessment->assessment_sections_count > 0 ? $assessment->assessment_sections_count.' Sections' : 'No Sections',
            'visibility' => $assessment->is_private ? 'Private' : 'Public',
            'subject' => $assessment->section->name,
        ];
    }
}
