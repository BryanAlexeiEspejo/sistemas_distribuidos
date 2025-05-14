<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            EstadoSeeder::class,
            GeneroSeeder::class,
            AdminUserSeeder::class,
CategoriaSeeder::class,
        ]);
    }
}
