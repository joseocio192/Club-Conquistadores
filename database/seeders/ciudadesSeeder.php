<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class ciudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ciudad = new Ciudad();
        $ciudad->nombre = 'Culiacan';
        $ciudad->municipio_id = 1;
        $ciudad->save();
        $ciudad = new Ciudad();
        $ciudad->nombre = 'Los Mochis';
        $ciudad->municipio_id = 2;
        $ciudad->save();
        $ciudad = new Ciudad();
        $ciudad->nombre = 'Mazatlan';
        $ciudad->municipio_id = 3;
        $ciudad->save();


    }
}
