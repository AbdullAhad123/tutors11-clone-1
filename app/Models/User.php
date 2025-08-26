<?php
/**
 * File name: User.php
 * Last modified: 19/07/21, 10:54 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Models;

use App\Traits\SecureDeletes;
use App\Traits\SubscriptionTrait;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Filters\QueryFilter;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
use Illuminate\Database\Eloquent\Builder;


class User extends Authenticatable implements Wallet, MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SchemalessAttributesTrait;
    use HasRoles;
    use HasWallet;
    use SoftDeletes;
    use SecureDeletes;
    use SubscriptionTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'profile_photo_path',
        'mobile',
        'email',
        'password',
        'is_active',
        'email_verified_at',
        'login_at',
        'preferences',
        'avatar_selected',
        'verification_code',
        'ip_address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'verification_code',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
        'login_at' => 'date',
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'profile_photo_url',
        'role_id',
        'wallet_balance',
    ];

    protected $schemalessAttributes = [
        'preferences',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function userGroups()
    {
        return $this->belongsToMany(UserGroup::class, 'user_group_users', 'user_id', 'user_group_id')
            ->withPivot('joined_at');
    }

    public function practiceSessions()
    {
        return $this->hasMany(PracticeSession::class);
    }

    public function quizSessions()
    {
        return $this->hasMany(QuizSession::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function avatars()
    {
        return $this->hasMany(Avatar::class);
    }

    public function userAvatars()
    {
        return $this->hasMany(UserAvatar::class);
    }

    public function userGroupUsers()
    {
        return $this->hasMany(UserGroupUsers::class, 'user_id');
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

    public function scopeWithPreferencesAttributes(): Builder
    {
        return $this->preferences->modelScope();
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getWalletBalanceAttribute()
    {
        return $this->balance;
    }

    public function getRoleIdAttribute()
    {
        return $this->roles->count() > 0 ? $this->roles->first()->name : null;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
