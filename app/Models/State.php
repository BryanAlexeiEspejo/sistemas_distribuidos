<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'event_management.states';
    protected $primaryKey = 'state_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'state_id',
        'country_id',
        'state_name',
        'state_code'
    ];
}
