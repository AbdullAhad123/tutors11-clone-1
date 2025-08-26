<?php
/**
 * File name: QuizType.php
 * Last modified: 19/07/21, 5:43 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Models;

use App\Filters\QueryFilter;
use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class QuizType extends Model
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
        static::creating(function ($quiz) {
            $quiz->attributes['code'] = 'qtp_'.Str::random(11);
            $quiz->attributes['slug'] = $originalSlug = Str::slug($quiz->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $quiz->attributes['slug'])->exists()) {
                $quiz->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($quiz) {
            $quiz->attributes['slug'] = $originalSlug = Str::slug($quiz->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $quiz->attributes['slug'])->exists()) {
                $quiz->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function latestQuiz()
    {
        return $this->hasOne(Quiz::class)->latest();
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
