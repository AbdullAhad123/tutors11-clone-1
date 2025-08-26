<?php

namespace App\Models;

use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentTestSections extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SecureDeletes;

    protected $guarded = [];

    protected $casts = [
        'auto_duration' => 'boolean',
        'auto_grading' => 'boolean',
        'enable_negative_marking' => 'boolean',
        'enable_section_cutoff' => 'boolean',
        'assign_assessmentiner' => 'boolean',
        'assessmentined' => 'boolean',
        'approved' => 'boolean',
        'assessmentined_at' => 'datetime',
        'approved_at' => 'datetime',
    ];



    public function updateMeta($ass = null)
    {
        $this->total_questions = $this->questions()->count();

        if ($ass->settings->get('auto_duration', true)) {
            $this->total_duration = $this->questions()->sum('default_time');
        }

        if ($ass->settings->get('auto_grading', true)) {
            $this->total_marks = $this->questions()->sum('default_marks');
        } else {
            $this->total_marks = $this->questions()->count() * $this->correct_marks;
        }

        $this->update();
    }


    public function assessment()
    {
        return $this->belongsTo(AssessmentTest::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class,"assessment_questions","assessment_test_section_id","question_id");
    }

    public function assessmentSessions()
    {
        return $this->belongsToMany(AssessmentTestSession::class, 'assessment_test_session_sections','assessment_section_id','assessment_session_id');
    }

}
