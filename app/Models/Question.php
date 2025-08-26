<?php
/**
 * File name: Question.php
 * Last modified: 16/07/21, 9:44 PM
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
use Illuminate\Support\Facades\Auth;
use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Builder;


class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SecureDeletes;
    use BelongsToThrough;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'options' => 'array',
        'preferences' => 'object',
        'has_attachment' => 'boolean',
        'attachment_options' => 'object',
        'solution_video' => 'object',
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->attributes['code'] = 'que_'.Str::random(11);
            $category->attributes['created_by'] = Auth::user()->id;
        });

        // static::addGlobalScope('corrected', function (Builder $builder) {
        //     $builder->where('corrected', 1);
        // });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function journeySetQuestion()
    {
        return $this->hasOne(JourneySetQuestion::class, 'question_id');
    }

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function section()
    {
        return $this->belongsToThrough(Section::class, Skill::class);
    }

    public function difficultyLevel()
    {
        return $this->belongsTo(DifficultyLevel::class);
    }

    public function comprehensionPassage()
    {
        return $this->belongsTo(ComprehensionPassage::class);
    }

    public function practiceSets()
    {
        return $this->belongsToMany(PracticeSet::class, 'practice_set_questions', 'question_id', 'practice_set_id');
    }

    public function PracticeSessionQuestions()
    {
        return $this->belongsToMany(PracticeSessionQuestion::class);
    }

    public function practiceSessions()
    {
        return $this->belongsToMany(PracticeSession::class, 'practice_session_questions')
            ->withPivot('status', 'original_question', 'is_correct', 'time_taken', 'options', 'user_answer', 'correct_answer', 'points_earned');
    }

    public function journeySets()
    {
        return $this->belongsToMany(JourneySet::class, 'journey_set_questions', 'question_id', 'journey_set_id');
    }

    public function JourneySessionQuestions()
    {
        return $this->belongsToMany(JourneySessionQuestion::class);
    }

    public function journeySessions()
    {
        return $this->belongsToMany(JourneySession::class, 'journey_session_questions')
            ->withPivot('status', 'original_question', 'is_correct', 'time_taken', 'options', 'user_answer', 'correct_answer', 'points_earned');
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_questions', 'question_id', 'quiz_id');
    }

    public function quizSessions()
    {
        return $this->belongsToMany(QuizSession::class, 'quiz_session_questions')
            ->withPivot('status', 'original_question', 'options', 'is_correct', 'time_taken', 'user_answer', 'correct_answer', 'marks_earned', 'marks_deducted');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    // Inside your Question model (Question.php)
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
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

    public function getCorrectAnswerAttribute($value)
    {
        return unserialize($value);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setCorrectAnswerAttribute($value)
    {
        $this->attributes['correct_answer'] = serialize($value);
    }

}
