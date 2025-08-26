<?php

namespace App\Transformers\Admin;

use App\Models\mocks;
use League\Fractal\TransformerAbstract;

class MockTransformer extends TransformerAbstract
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
            'code' => $mock->code,
            'title' => $mock->title,
            // 'mockType' => $mock->mockType->name,
            'category' => $mock->subCategory->name,
            'sections' => $mock->mock_sections_count > 0 ? $mock->mock_sections_count.' Sections' : 'No Sections',
            'visibility' => $mock->is_private ? 'Private' : 'Public',
            'status' => $mock->is_active ? 'Published' : 'Draft',
        ];
    }
}
