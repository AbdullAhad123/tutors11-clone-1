<?php

namespace App\Models;

use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;

class AssessmentTestSession extends Model
{

    use HasFactory;
    use SchemalessAttributesTrait;
    use SoftDeletes;
    use SecureDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $guarded = [];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'completed_at' => 'datetime',
        'assessment_sections' => 'array',
    ];

    protected $schemalessAttributes = [
        'results',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->attributes['code'] = Str::uuid();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function assessment()
    {
        return $this->belongsTo(AssessmentTest::class, 'assessment_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sections()
    {

        // return $this->belongsToMany(AssessmentTestSections::class, 'assessment_test_session_sections','assessment_session_id','assessment_section_id')
        //     ->withPivot('sno', 'name', 'status', 'section_id', 'starts_at', 'ends_at', 'total_time_taken', 'current_question', 'results');
        return $this->belongsToMany(AssessmentTestSections::class, 'assessment_test_session_sections',"assessment_session_id","assessment_section_id")

            ->withPivot('sno', 'name', 'status', 'section_id', 'starts_at', 'ends_at', 'total_time_taken', 'current_question', 'results');
    }

    public function questions()
    {

        return $this->belongsToMany(Question::class, 'assessment_test_session_questions','assessment_session_id')

            ->withPivot('status', 'assessment_section_id', 'original_question', 'options', 'is_correct', 'time_taken', 'user_answer', 'correct_answer', 'marks_earned', 'marks_deducted');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopePending($query)
    {
        return $query->where('status', '=', 'started');
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
