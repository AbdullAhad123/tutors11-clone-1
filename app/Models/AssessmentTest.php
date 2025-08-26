<?php

namespace App\Models;

use App\Filters\QueryFilter;
use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;

class AssessmentTest extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SecureDeletes;
    use SchemalessAttributesTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::creating(function ($subCategory) {
            $subCategory->attributes['code'] = 'assessment_' . Str::random(11);
            $subCategory->attributes['slug'] = $originalSlug = Str::slug($subCategory->attributes['title']);
            $count = 1;
            while (static::withTrashed()->where('slug', $subCategory->attributes['slug'])->exists()) {
                $subCategory->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($subCategory) {
            $subCategory->attributes['slug'] = $originalSlug = Str::slug($subCategory->attributes['title']);
            $count = 1;
            while (static::withTrashed()->where('slug', $subCategory->attributes['slug'])->exists()) {
                $subCategory->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });
    }


    protected $fillable = [
        'title',
    ];
    protected $schemalessAttributes = [
        'settings',
    ];
    public function updateMeta($ass)
    {
        $ass->total_duration = $this->assessmentSections()->sum('total_duration');
        $ass->total_questions = $this->questions()->count();
        $ass->total_marks = $this->assessmentSections()->sum('total_marks');
        $this->update();
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function sessions()
    {
        return $this->hasMany(AssessmentTestSession::class,'assessment_id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class, "section_id", "id");
    }
    public function assessmentType()
    {
        return $this->belongsTo(AssessmentTestType::class);
    } 
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'assessment_questions', 'assessment_id', 'question_id');
    }

    public function assessmentSections()
    {
        return $this->hasMany(AssessmentTestSections::class);
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeWithSettings(): Builder
    {
        return $this->settings->modelCast();
    }

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}
