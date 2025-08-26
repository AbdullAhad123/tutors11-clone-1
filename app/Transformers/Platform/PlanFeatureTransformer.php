<?php

namespace App\Transformers\Platform;

use App\Models\Feature;
use League\Fractal\TransformerAbstract;

class PlanFeatureTransformer extends TransformerAbstract
{
    private $features;

    public function __construct($features)
    {
        $this->features = $features;
    }

    /**
     * A Fractal transformer.
     *
     * @param Feature $feature
     * @return array
     */
    public function transform(Feature $feature)
    {
        return [
            'id' => $feature->id,
            'code' => $feature->code,
            'name' => $feature->name,
            'description' => $feature->description,
            'is_active' => $feature->is_active,
        ];
    }
}
