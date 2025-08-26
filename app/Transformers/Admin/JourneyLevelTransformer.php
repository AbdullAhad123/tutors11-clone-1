<?php
/**
 * File name: JourneyTransformer.php
 * Last modified: 17/06/21, 4:10 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\JourneyLevel;
use App\Models\JourneySet;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class JourneyLevelTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Journey $journey
     * @return array
     */
    public function transform(JourneyLevel $level)
    {
        return [
            'id' => $level->id,
            'code' => $level->code,
            'image_path' => $level->img_path,
            'image_width' => $level->img_width,
            'position_x' => $level->img_position_x,
            'position_y' => $level->img_position_y,
            'description' => $level->description !== null ? $level->description : '--',
            'sets' => fractal(JourneySet::where("journey_level_id", $level->id)->get(), new JourneySetTransformer())->toArray(),
            'setBy' => $level->set_by !== null ? User::findOrFail($level->set_by)->first_name . ' ' . User::findOrFail($level->set_by)->last_name : '--',
            'status' => $level->is_active == true ? 'active' : 'in-active',
        ];
    }
}

