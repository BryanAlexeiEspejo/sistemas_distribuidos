<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('estados')->insert([
            ['id' => 1, 'nombre' => 'ACTIVO'],
            ['id' => 2, 'nombre' => 'PENDIENTE'],
            ['id' => 3, 'nombre' => 'INACTIVO'],
        ]);
    }
}
