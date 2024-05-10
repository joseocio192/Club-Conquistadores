<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clase;
use App\Models\Clase_xalumno;

class claseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clase = new Clase();
        $clase->id = 1;
        $clase->club_id = 1;
        $clase->instructor = 1;
        $clase->nombre = 'Clase 1';
        $clase->color = 'Rojo';
        $clase->logo = 'Logo 1';
        $clase->horario = 'Horario 1';
        $clase->locale = 'es';
        $clase->save();

        $claseAlumno = new Clase_xalumno();
        $claseAlumno->clase_id = 1;
        $claseAlumno->conquistador = 1;
        $claseAlumno->save();
    }
}
