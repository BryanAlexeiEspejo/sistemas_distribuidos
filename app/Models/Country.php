<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'event_management.countries';
    protected $primaryKey = 'country_id';
    public $incrementing = false; // porque es character(2)
    public $timestamps = false;

    protected $keyType = 'string';

    protected $fillable = [
        'country_id',
        'country_name',
        'phone_code',
        'is_active'
    ];
}
