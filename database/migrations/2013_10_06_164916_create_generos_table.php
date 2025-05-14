<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('generos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_genero')->autoIncrement(); // Cambia de 'id' a 'id_genero'
            $table->string('nombre_genero', 45);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('generos');
    }
};
