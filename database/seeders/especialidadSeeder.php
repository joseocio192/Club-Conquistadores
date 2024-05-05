<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class especialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidad = new Especialidad();
        $especialidad->nombre = 'Avicultura';
        $especialidad->locale = 'es';
        $especialidad->save();
        $especialidad = new Especialidad();
        $especialidad->nombre = 'Pintura en vidrio';
        $especialidad->locale = 'es';
        $especialidad->save();
    }
}
