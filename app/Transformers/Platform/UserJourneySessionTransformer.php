<?php
/**
 * File name: UserJourneySessionTransformer.php
 * Last modified: 16/07/21, 11:36 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Platform;

use App\Models\JourneySession;
use League\Fractal\TransformerAbstract;

class UserJourneySessionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param JourneySession $session
     * @return array
     */
    public function transform(JourneySession $session)
    {
        return [
            'id' => $session->code,
            'slug' => $session->journeySet->slug,
            'name' => $session->journeySet->title,
            'subtitle' => $session->journeySet->subtitle ? $session->journeySet->subtitle : '--',
            'total_points_earned' => $session->total_points_earned.' XP',
            'completed' => $session->completed_at->toFormattedDateString()
        ];
    }
}
