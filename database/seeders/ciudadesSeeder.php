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

        $ciudad = new Ciudad();
        $ciudad->nombre = 'Aguascalientes';
        $ciudad->municipio_id = 4;
        $ciudad->save();

        $ciudad = new Ciudad();
        $ciudad->nombre = 'Cabo san lucas';
        $ciudad->municipio_id = 7;
        $ciudad->save();

        $ciudad = new Ciudad();
        $ciudad->nombre = 'San jose del cabo';
        $ciudad->municipio_id = 7;
        $ciudad->save();


    }
}
