<?php
/**
 * File name: Section.php
 * Last modified: 08/07/21, 11:39 AM
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

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SecureDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'sections';

    protected $guarded = [];

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
        static::creating(function ($section) {
            $section->attributes['code'] = 'sub_'.Str::random(11);
            $section->attributes['slug'] = $originalSlug = Str::slug($section->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $section->attributes['slug'])->exists()) {
                $section->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($section) {
            $section->attributes['slug'] = $originalSlug = Str::slug($section->attributes['name']);
            $count = 1;
            while (static::withTrashed()->where('slug', $section->attributes['slug'])->exists()) {
                $section->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function topics()
    {
        return $this->hasManyThrough(Topic::class, Skill::class);
    }

    public function questions()
    {
        return $this->hasManyThrough(Question::class, Skill::class);
    }

    public function practiceSets()
    {
        return $this->hasManyThrough(PracticeSet::class, Skill::class);
    }

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'sub_category_sections', 'section_id', 'sub_category_id');
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
        return $query->where('is_active', 1);
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
