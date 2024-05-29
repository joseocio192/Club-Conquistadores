<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidad;
use App\Models\Conquistador_xespecialidad;

class EspecialidadSeeder extends Seeder
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

        $Conquistador_xespecialidad = new Conquistador_xespecialidad();
        $Conquistador_xespecialidad->conquistador_id = 1;
        $Conquistador_xespecialidad->especialidad_id = 1;
        $Conquistador_xespecialidad->save();

        $especialidad = new Especialidad();
        $especialidad->nombre = 'Pintura en vidrio';
        $especialidad->locale = 'es';
        $especialidad->save();
    }
}
