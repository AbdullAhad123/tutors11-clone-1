<?php
/**
 * File name: SchoolTransformer.php
 * Last modified: 01/02/21, 5:16 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\School;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Str;

class SchoolsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Category $category
     * @return array
     */
    public function transform(School $school)
    {
        return [
            'id' => $school->id,
            'name' => $school->name,
            'slug' => $school->slug,
            'image' => $school->image,
            'logo' => $school->logo,
            'type' => $school->type,
            'region' => $school->regionData ? $school->regionData->name : $school->region,
            'region_slug' => $school->regionData ? $school->regionData->slug : Str::of($school->region)->slug('-'),
        ];
    }
}
