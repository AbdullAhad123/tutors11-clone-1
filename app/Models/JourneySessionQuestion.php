<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourneySessionQuestion extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function journeySession()
    {
        return $this->belongsTo(JourneySession::class, 'journey_session_id');
    }

}
