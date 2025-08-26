<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filters\QueryFilter;

class ErrorLog extends Model
{
    use HasFactory;

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}
