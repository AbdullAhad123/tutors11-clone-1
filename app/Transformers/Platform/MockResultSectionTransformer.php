<?php

namespace App\Transformers\Platform;

use App\Models\mock_sections;
use League\Fractal\TransformerAbstract;

class MockResultSectionTransformer extends TransformerAbstract
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
            'sno' => $section->pivot->sno,
            'name' => $section->pivot->name,
            'section_id' => $section->pivot->section_id,
            'total_questions' => $section->total_questions,
            'results' => json_decode($section->pivot->results, true),
        ];
    }
}

