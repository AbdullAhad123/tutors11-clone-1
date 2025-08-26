<?php
/**
 * File name: ExamSearchTransformer.php
 * Last modified: 18/06/21, 2:45 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\AssessmentTest;
use League\Fractal\TransformerAbstract;

class AssessmentSearchTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param AssessmentTest $assessement
     * @return array
     */
    public function transform(AssessmentTest $assessement)
    {
        return [
            'id' => $assessement->id,
            'title' => $assessement->title
        ];
    }
}
