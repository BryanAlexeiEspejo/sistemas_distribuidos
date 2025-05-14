<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50); // Campo para el nombre
            $table->string('apellido', 50); // Campo para el apellido
            $table->string('email', 50)->unique();
            $table->string('password', 500);
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('genero_id');
            $table->integer('errores_usuario')->default(0);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('genero_id')->references('id_genero')->on('generos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
