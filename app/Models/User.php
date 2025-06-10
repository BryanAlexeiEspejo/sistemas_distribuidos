<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $connection = 'pgsql';
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = true;

    protected $fillable = [
        'username',
        'email',
        'password_hash',
        'salt',
        'status_id',
        'email_verified',
        'phone',
        'phone_verified',
        'mfa_enabled',
        'mfa_secret',
        'locale',
        'timezone',
        'last_login',
        'failed_login_attempts',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password_hash',
        'salt',
        'mfa_secret',
    ];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function getAuthIdentifierName()
    {
        return 'email';
    }
    public function userProfile()
    {
        return $this->hasOne(\App\Models\UserProfile::class, 'user_id');
    }


}
