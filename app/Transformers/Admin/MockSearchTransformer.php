<?php
/**
 * File name: ExamSearchTransformer.php
 * Last modified: 18/06/21, 2:45 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\mocks;
use League\Fractal\TransformerAbstract;

class MockSearchTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param mocks $mock
     * @return array
     */
    public function transform(mocks $mock)
    {
        return [
            'id' => $mock->id,
            'title' => $mock->title
        ];
    }
}
