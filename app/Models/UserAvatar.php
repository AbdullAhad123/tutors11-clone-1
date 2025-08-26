<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Filters\QueryFilter;

class UserAvatar extends Model
{
    use HasFactory;

    protected $table = 'users_avatars';
    protected $guarded = [];

    protected $fillable = [
        'avatar',
        'is_selected',
    ];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::creating(function ($avatar) {
            $avatar->attributes['user'] = Auth::user()->id;
        });

        static::updating(function ($avatar) {
            
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function avatar()
    {
        return $this->belongsTo(Avatar::class, 'avatar', 'id');
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

}
