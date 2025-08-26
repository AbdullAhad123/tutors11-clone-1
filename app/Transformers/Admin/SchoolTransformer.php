<?php
/**
 * File name: SchoolTransformer.php
 * Last modified: 11/05/21, 5:48 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\School;
use League\Fractal\TransformerAbstract;

class SchoolTransformer extends TransformerAbstract
{
    public function transform(School $school)
    {
        return [
            'id' => $school->id,
            'name' => $school->name,
            'slug' => $school->slug,
            'website' => $school->website,
            'type' => $school->type,
            'phone' => $school->phone,
            'email' => $school->email,
            'address' => $school->address,
            'location' => $school->location,
            'logo' => $school->logo,
            'image' => $school->image,
            'region' => $school->region,
            'exam_boards' => $school->exam_boards,
            'exam_styles' => $school->exam_styles,
            'created_at' => $school->created_at,
        ];
    }
}

