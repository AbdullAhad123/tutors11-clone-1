<?php
/**
 * File name: JourneyTransformer.php
 * Last modified: 17/06/21, 4:10 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\Journey;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class JourneyTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Journey $journey
     * @return array
     */
    public function transform(Journey $journey)
    {
        return [
            'id' => $journey->id,
            'code' => $journey->code,
            'themeImgPath' => $journey->theme_img_path,
            'year' => $journey->subCategory->name,
            'subject' => $journey->section->name,
            'iconImgPath' => $journey->icon_img_path,
            'movingLineColor' => $journey->moving_line_color,
            'setBy' => $journey->set_by !== null ? User::findOrFail($journey->set_by)->first_name . ' ' . User::findOrFail($journey->set_by)->last_name : '--',
            'status' => $journey->is_active,
        ];
    }
}

