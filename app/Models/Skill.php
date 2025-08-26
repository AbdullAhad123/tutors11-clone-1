<?php
/**
 * File name: Skill.php
 * Last modified: 08/07/21, 11:48 AM
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

class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SecureDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'skills';

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::creating(function ($skill) {
            $skill->attributes['code'] = 'top_' . Str::random(11);
            $skill->attributes['slug'] = $originalSlug = Str::slug($skill->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $skill->attributes['slug'])->exists()) {
                $skill->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($skill) {
            $skill->attributes['slug'] = $originalSlug = Str::slug($skill->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $skill->attributes['slug'])->exists()) {
                $skill->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function practiceSets()
    {
        return $this->hasMany(PracticeSet::class);
    }

    public function practiceLessons()
    {
        return $this->belongsToMany(Lesson::class, 'practice_lessons', 'skill_id', 'lesson_id')->withPivot('sort_order');
    }

    public function practiceVideos()
    {
        return $this->belongsToMany(Video::class, 'practice_videos', 'skill_id', 'video_id')->withPivot('sort_order');
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

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
