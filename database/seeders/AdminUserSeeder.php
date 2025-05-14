<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener los roles por nombre
        $adminRole = DB::table('roles')->where('name', 'ADMINISTRADOR')->first();
        $empleadoRole = DB::table('roles')->where('name', 'EMPLEADO')->first();
        $clienteRole = DB::table('roles')->where('name', 'CLIENTE')->first();

        $adminRoleId = $adminRole->id;
        $empleadoRoleId = $empleadoRole->id;
        $clienteRoleId = $clienteRole->id;

        // Obtener el género y estado
        $generoMasculino = DB::table('generos')->where('nombre_genero', 'MASCULINO')->first()->id_genero;
        $estadoActivo = DB::table('estados')->where('nombre', 'ACTIVO')->first()->id;

        // Crear o actualizar usuarios
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'nombre' => 'Usuario',
                'apellido' => 'Administrador',
                'email' => 'admin@example.com',
                'password' => Hash::make('empresainformatica'),
                'role_id' => $adminRoleId,
                'genero_id' => $generoMasculino,
                'estado_id' => $estadoActivo,
            ]
        );

        User::updateOrCreate(
            ['email' => 'empleado@example.com'],
            [
                'nombre' => 'Empleado',
                'apellido' => 'User',
                'email' => 'empleado@example.com',
                'password' => Hash::make('empleado123'),
                'role_id' => $empleadoRoleId,
                'genero_id' => $generoMasculino,
                'estado_id' => $estadoActivo,
            ]
        );

        User::updateOrCreate(
            ['email' => 'cliente@example.com'],
            [
                'nombre' => 'Cliente',
                'apellido' => 'User',
                'email' => 'cliente@example.com',
                'password' => Hash::make('cliente123'),
                'role_id' => $clienteRoleId,
                'genero_id' => $generoMasculino,
                'estado_id' => $estadoActivo,
            ]
        );
    }
}
