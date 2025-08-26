<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeSessionQuestion extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function practiceSession()
    {
        return $this->belongsTo(PracticeSession::class, 'practice_session_id');
    }

}
