<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('generos')->insert([
            ['id_genero' => 1, 'nombre_genero' => 'MASCULINO'],
            ['id_genero' => 2, 'nombre_genero' => 'FEMENINO'],
        ]);
    }
}
