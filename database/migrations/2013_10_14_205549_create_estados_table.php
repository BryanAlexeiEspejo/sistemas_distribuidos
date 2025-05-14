<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental
            $table->string('nombre', 45); // Nombre del estado
            $table->timestamps(); // Columnas created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estados'); // Elimina la tabla si se realiza un rollback
    }
};
