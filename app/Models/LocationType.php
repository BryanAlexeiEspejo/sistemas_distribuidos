<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationType extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'event_management.location_types';
    protected $primaryKey = 'location_type_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'location_type_id',
        'type_name',
        'description'
    ];
}
