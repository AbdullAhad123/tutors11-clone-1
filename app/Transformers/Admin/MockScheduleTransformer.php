<?php

namespace App\Transformers\Admin;

use App\Models\mock_schedules;
use League\Fractal\TransformerAbstract;

class MockScheduleTransformer extends TransformerAbstract
{
    public function transform(mock_schedules $mockSchedule)
    {
        return [
            'id' => $mockSchedule->id,
            'code' => $mockSchedule->code,
            'mock' => $mockSchedule->mock->title,
            'type' => ucfirst($mockSchedule->schedule_type),
            'starts_at' => $mockSchedule->starts_at->toDayDateTimeString(),
            'ends_at' => $mockSchedule->ends_at->toDayDateTimeString(),
            'status' => ucfirst($mockSchedule->status),
        ];
    }
}

