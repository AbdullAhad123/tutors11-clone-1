<?php

namespace App\Transformers\Admin;

use App\Models\MockTypes;
use League\Fractal\TransformerAbstract;

class MockTypeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param MockTypes $mockType
     * @return array
     */
    public function transform(MockTypes $mockType)
    {
        return [
            'id' => $mockType->id,
            'name' => $mockType->name,
            'code' => $mockType->code,
            'status' => $mockType->is_active,
        ];
    }
}
