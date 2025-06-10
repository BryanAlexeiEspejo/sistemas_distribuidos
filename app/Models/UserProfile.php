<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'user_profiles';
    protected $primaryKey = 'profile_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'doc_type_id',
        'doc_number',
        'birth_date',
        'gender',
        'avatar_url',
        'bio',
        'website_url',
    ];

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
