<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Municipio;

class municipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipio = new Municipio();
        $municipio->nombre = 'Culiacan';
        $municipio->estado_id = 1;
        $municipio->save();
        $municipio = new Municipio();
        $municipio->nombre = 'Los Mochis';
        $municipio->estado_id = 1;
        $municipio->save();
        $municipio = new Municipio();
        $municipio->nombre = 'Mazatlan';
        $municipio->estado_id = 1;
        $municipio->save();
    }
}
