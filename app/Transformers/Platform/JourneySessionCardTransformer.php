<?php
/**
 * File name: JourneySessionCardTransformer.php
 * Last modified: 15/06/21, 6:00 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\User;
use App\Models\JourneySession;
use League\Fractal\TransformerAbstract;

class JourneySessionCardTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param JourneySession $session
     * @return array
     */
    public function transform(JourneySession $session)
    {
        if ($session->journeySet === null || $session->journeySet->skill === null) {
            return [];
        }
        $return = [
            'code' => $session->code,
            'title' => $session->journeySet->title,
            'slug' => $session->journeySet->slug,
            'total_questions' => $session->journeySet->total_questions,
            'skill' => $session->journeySet->skill->name,
            'percentage_completed' => round($session->percentage_completed, 0),
            'set_by' => $session->journeySet->set_by !== null ? User::findOrFail($session->journeySet->set_by)->first_name : null,
        ];
        return $return;
    }
}
