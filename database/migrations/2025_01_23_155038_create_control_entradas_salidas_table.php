<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('control_entradas_salidas', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50); // Relacionado con el email del usuario
            $table->enum('tipo', ['entrada', 'salida']); // Tipo: entrada o salida
            $table->timestamp('fecha_hora')->useCurrent(); // Fecha y hora de la acción
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade'); // Llave foránea con la tabla users
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('control_entradas_salidas');
    }
};
