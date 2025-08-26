<?php
/**
 * File name: PracticeSet.php
 * Last modified: 19/07/21, 11:18 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Models;

use App\Filters\QueryFilter;
use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PracticeSet extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SecureDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'practice_sets';

    protected $guarded = [];

    protected $casts = [
        'settings' => 'array',
        'auto_grading' => 'boolean',
        'total_questions' => 'integer',
        'is_active' => 'boolean',
		'is_paid' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::creating(function ($practiceSet) {
            $practiceSet->attributes['code'] = 'set_'.Str::random(11);
            $practiceSet->attributes['set_by'] = Auth::user()->id;
            $practiceSet->attributes['slug'] = $originalSlug = Str::slug($practiceSet->attributes['title']);
            $count = 1;
            while (static::withTrashed()->where('slug', $practiceSet->attributes['slug'])->exists()) {
                $practiceSet->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($practiceSet) {
            $practiceSet->attributes['slug'] = $originalSlug = Str::slug($practiceSet->attributes['title']);
            $count = 1;
            while (static::withTrashed()->where('slug', $practiceSet->attributes['slug'])->exists()) {
                $practiceSet->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });
    }

    public function scopeFilteredByCategoryAndDescription($query, $category_id)
    {
        return $query->where('sub_category_id', $category_id)
            ->where(function ($query) {
                $query->whereNull('description')
                    ->orWhere(function ($query) {
                        $query->whereNotNull('description')
                            ->where('description', 'NOT LIKE', '%Journey%');
                    });
            });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function SetBy()
    {
        return $this->belongsTo(User::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function SuggestedPracticeSet()
    {
        return $this->belongsTo(SuggestedPracticeSets::class,"practice_set_id","id");
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'practice_set_questions', 'practice_set_id', 'question_id');
    }

    public function sessions()
    {
        return $this->hasMany(PracticeSession::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
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

    public function scopePublished($query)
    {
        $query->where('is_active', true);
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
