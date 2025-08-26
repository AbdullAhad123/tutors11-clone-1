<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestedPracticeSets extends Model
{
    use HasFactory;
    public function practiceset()
    {
        return $this->hasMany(PracticeSet::class,"id","practice_set_id");
    }
}

?>
