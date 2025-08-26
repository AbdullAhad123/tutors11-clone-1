<?php
/**
 * File name: SchoolRegionTransformer.php
 * Last modified: 11/05/21, 5:48 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\Region;
use League\Fractal\TransformerAbstract;

class SchoolRegionTransformer extends TransformerAbstract
{
    public function transform(Region $region)
    {
        return [
            'id' => $region->id,
            'name' => $region->name,
            'slug' => $region->slug,
            'description' => $region->description,
            'created_at' => $region->created_at
        ];
    }
}

