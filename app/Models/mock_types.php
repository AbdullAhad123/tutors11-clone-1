<?php

namespace App\Models;

use App\Filters\QueryFilter;
use App\Traits\SecureDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MockTypes extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SecureDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $guarded = [];

    protected $appends = ['plural_name'];


    public $casts = [
        'is_active' => 'boolean'
    ];

    /*
   |--------------------------------------------------------------------------
   | FUNCTIONS
   |--------------------------------------------------------------------------
   */

    protected static function booted()
    {
        static::creating(function ($mock) {
            $mock->attributes['code'] = 'etp_'.Str::random(11);
            $mock->attributes['slug'] = $originalSlug = Str::slug($mock->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $mock->attributes['slug'])->exists()) {
                $mock->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($mock) {
            $mock->attributes['slug'] = $originalSlug = Str::slug($mock->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $mock->attributes['slug'])->exists()) {
                $mock->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function mock()
    {
        return $this->hasMany(mocks::class, 'mock_type_id');
    }

    public function latestMock()
    {
        return $this->hasOne(mocks::class)->latest();
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function scopeActive($query)
    {
        $query->where('is_active', true);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getPluralNameAttribute()
    {
        return Str::plural($this->name);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
