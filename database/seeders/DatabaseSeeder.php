<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(paisSeeder::class);
        $this->call(estadosSeeder::class);
        $this->call(municipiosSeeder::class);
        $this->call(ciudadesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(especialidadSeeder::class);
        $this->call(clubsSeeder::class);
        $this->call(conquistadorSeeder::class);
        $this->call(claseSeeder::class);
        $this->call(tareaSeeder::class);
    }

}
