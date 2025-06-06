<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'event_management.cities';
    protected $primaryKey = 'city_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'city_id',
        'state_id',
        'city_name',
        'postal_code',
        'is_active'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
