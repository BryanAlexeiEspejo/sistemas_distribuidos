<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'events';
    protected $primaryKey = 'event_id';
    protected $fillable = [
        'event_name', 'event_type_id', 'event_status_id', 'event_date',
        'event_time', 'location_id', 'description', 'is_active'
    ];
}
