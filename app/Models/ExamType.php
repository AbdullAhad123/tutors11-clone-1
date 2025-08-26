<?php

namespace App\Models;

use App\Filters\QueryFilter;
use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ExamType extends Model
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
        static::creating(function ($exam) {
            $exam->attributes['code'] = 'etp_'.Str::random(11);
            $exam->attributes['slug'] = $originalSlug = Str::slug($exam->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $exam->attributes['slug'])->exists()) {
                $exam->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($exam) {
            $exam->attributes['slug'] = $originalSlug = Str::slug($exam->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $exam->attributes['slug'])->exists()) {
                $exam->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function latestExam()
    {
        return $this->hasOne(Exam::class)->latest();
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
