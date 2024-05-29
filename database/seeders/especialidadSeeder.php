<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidad;
use App\Models\Conquistador_xespecialidad;
use App\Models\Requisitos;
use App\Models\Requisitos_xconquistador;

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

        $requisito = new Requisitos();
        $requisito->especialidad_id = 1;
        $requisito->nombre = 'aves';
        $requisito->descripcion = 'Aprender todas las razas de aves';
        $requisito->locale = 'es';
        $requisito->save();

        $requisito_conquistador = new Requisitos_xconquistador();
        $requisito_conquistador->requisitos_id = 1;
        $requisito_conquistador->conquistador_id = 1;
        $requisito_conquistador->save();

        $especialidad = new Especialidad();
        $especialidad->nombre = 'Pintura en vidrio';
        $especialidad->locale = 'es';
        $especialidad->save();
    }
}
