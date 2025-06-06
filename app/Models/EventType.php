<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'event_management.event_types';
    protected $primaryKey = 'event_type_id';
    public $incrementing = false;
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'event_type_id',
        'type_name',
        'description',
        'is_active',
    ];
}
