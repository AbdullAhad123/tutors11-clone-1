<?php
/**
 * File name: ExamTypeTransformer.php
 * Last modified: 25/05/22, 5:10 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2022
 */


namespace App\Transformers\Platform;

use App\Models\AssessmentTestType;
use Illuminate\Support\Str;
use League\Fractal\TransformerAbstract;

class AssessmentTypeTransformer extends TransformerAbstract
{
    public function transform(AssessmentTestType $assessmentType)
    {
        return [
            'slug' => $assessmentType->slug,
            'code' => $assessmentType->code,
            'name' => Str::plural($assessmentType->name),
            'color' => '#'.$assessmentType->color,
            'image' => $assessmentType->image_path,
        ];
    }
}


