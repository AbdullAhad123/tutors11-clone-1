<?php

namespace App\Transformers\Admin;

use App\Models\AssessmentTestType;
use League\Fractal\TransformerAbstract;

class AssessmentTypeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param AssessmentTestType $assessmentType
     * @return array
     */
    public function transform(AssessmentTestType $assessmentType)
    {
        return [
            'id' => $assessmentType->id,
            'name' => $assessmentType->name,
            'code' => $assessmentType->code,
            'status' => $assessmentType->is_active,
        ];
    }
}
