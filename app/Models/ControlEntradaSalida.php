<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlEntradaSalida extends Model
{
    use HasFactory;

    protected $table = 'control_entradas_salidas'; // Nombre de la tabla asociada
    protected $fillable = [
        'email',
        'tipo',
        'fecha_hora',
    ];

    // Relación opcional: Si necesitas la información del usuario desde la tabla `users`
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
