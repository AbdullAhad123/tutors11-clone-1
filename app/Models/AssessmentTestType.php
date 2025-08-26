<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filters\QueryFilter;
use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class AssessmentTestType extends Model
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
        static::creating(function ($assessment) {
            $assessment->attributes['code'] = 'etp_'.Str::random(11);
            $assessment->attributes['slug'] = $originalSlug = Str::slug($assessment->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $assessment->attributes['slug'])->exists()) {
                $assessment->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($assessment) {
            $assessment->attributes['slug'] = $originalSlug = Str::slug($assessment->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $assessment->attributes['slug'])->exists()) {
                $assessment->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function assessments()
    {
        return $this->hasMany(AssessmentTest::class,'assessment_type_id');
    }

    public function latestExam()
    {
        return $this->hasOne(AssessmentTest::class)->latest();
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
