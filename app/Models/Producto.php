<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['codigo_barras', 'nombre', 'categoria_id', 'precio', 'stock', 'foto'];

    /**
     * Relación con Categoría.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
