<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Consolas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Juegos', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Accesorios', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Figuras Coleccionables', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Tarjetas de Regalo', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
