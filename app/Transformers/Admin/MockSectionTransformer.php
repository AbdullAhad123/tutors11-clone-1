<?php

namespace App\Transformers\Admin;

use App\Models\mock_sections;
use League\Fractal\TransformerAbstract;

class MockSectionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param mock_sections $section
     * @return array
     */
    public function transform(mock_sections $section)
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
