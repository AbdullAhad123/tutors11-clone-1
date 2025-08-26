<?php
/**
 * File name: ExamTypeTransformer.php
 * Last modified: 25/05/22, 5:10 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2022
 */


namespace App\Transformers\Platform;

use App\Models\MockTypes;
use Illuminate\Support\Str;
use League\Fractal\TransformerAbstract;

class MockTypeTransformer extends TransformerAbstract
{
    public function transform(MockTypes $mocktype)
    {
        return [
            'slug' => $mocktype->slug,
            'code' => $mocktype->code,
            'name' => Str::plural($mocktype->name),
            'color' => '#'.$mocktype->color,
            'image' => $mocktype->image_path,
        ];
    }
}


