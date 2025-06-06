<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventStatus extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'event_management.event_statuses';
    protected $primaryKey = 'status_id';
    public $timestamps = false;

    protected $fillable = [
        'status_id',
        'status_name',
        'description',
        'is_system'
    ];
}
