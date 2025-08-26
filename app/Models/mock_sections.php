<?php

namespace App\Models;

use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mock_sections extends Model
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

    protected $casts = [
        'auto_duration' => 'boolean',
        'auto_grading' => 'boolean',
        'enable_negative_marking' => 'boolean',
        'enable_section_cutoff' => 'boolean',
        'assign_mockiner' => 'boolean',
        'mockined' => 'boolean',
        'approved' => 'boolean',
        'mockined_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function updateMeta()
    {

        $this->total_questions = $this->questions()->count();

        if ($this->mock->settings->get('auto_duration', true)) {
            $this->total_duration = $this->questions()->sum('default_time');
        }

        if ($this->mock->settings->get('auto_grading', true)) {
            $this->total_marks = $this->questions()->sum('default_marks');
        } else {
            $this->total_marks = $this->questions()->count() * $this->correct_marks;
        }

        $this->update();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    public function mock()
    {
        return $this->belongsTo(mocks::class,'mock_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'mock_questions', 'mock_section_id', 'question_id');
    }

    public function mockSessions()
    {
        return $this->belongsToMany(mock_sessions::class, 'mock_session_sections', 'mock_section_id','mock_session_id');
        // return $this->belongsToMany(mock_sessions::class, 'mock_session_sections','mock_session_id');
    }



    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

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


?>
