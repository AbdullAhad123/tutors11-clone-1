<?php
/**
 * File name: PracticeSetTransformer.php
 * Last modified: 17/06/21, 4:10 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\JourneySet;
use League\Fractal\TransformerAbstract;

class JourneySetTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param JourneySet $journeySet
     * @return array
     */
    public function transform(JourneySet $journeySet)
    {
        return [
            'id' => $journeySet->id,
            'title' => $journeySet->title,
            'subtitle' => $journeySet->subtitle ? $journeySet->subtitle : '--',
            'code' => $journeySet->code,
            'slug' => $journeySet->slug,
            'questions' => $journeySet->total_questions." Q's",
            'year' => $journeySet->subCategory->name,
            'topic' => $journeySet->skill ? $journeySet->skill->name : '--',
            'status' => $journeySet->is_active == true ? "Published" : "Draft",
        ];
    }
}

