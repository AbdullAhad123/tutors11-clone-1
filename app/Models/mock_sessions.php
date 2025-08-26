<?php

namespace App\Models;

use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;

class mock_sessions extends Model
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
        'mock_sections' => 'array',
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

    public function mock()
    {
        return $this->belongsTo(mocks::class, 'mock_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sections()
    {
        return $this->belongsToMany(mock_sections::class, 'mock_session_sections',"mock_session_id","mock_section_id")
            ->withPivot('sno', 'name', 'status', 'section_id', 'starts_at', 'ends_at', 'total_time_taken', 'current_question', 'results');
        // return $this->belongsToMany(mock_sections::class, 'mock_session_sections',"mock_section_id","mock_session_id")
        //     ->withPivot('sno', 'name', 'status', 'section_id', 'starts_at', 'ends_at', 'total_time_taken', 'current_question', 'results');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'mock_session_questions',"mock_session_id")
            ->withPivot('status', 'mock_section_id', 'original_question', 'options', 'is_correct', 'time_taken', 'user_answer', 'correct_answer', 'marks_earned', 'marks_deducted');
    }

    public function mockSchedule()
    {
        return $this->belongsTo(mock_schedules::class,'mock_id','mock_schedule_id');
    }
    // public function mock_session_sections()
    // {
    //     return $this->belongsTo(mock_session_sections::class,'mock_section_id','mock_session_sections');
    // }

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
