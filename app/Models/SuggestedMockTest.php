<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestedMockTest extends Model
{
    use HasFactory;

    public function mockset()
    {
        return $this->hasMany(mocks::class,"id","mock_test_id");
    }
}
