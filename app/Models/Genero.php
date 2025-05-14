<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'generos';
    protected $primaryKey = 'id_genero';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'nombre_genero',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'genero_id', 'id_genero');
    }
}
