<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tarea;
use App\Models\Tareaxconquistador;

class tareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tarea = new Tarea();
        $tarea->nombre = 'Tarea 1';
        $tarea->descripcion = 'Descripcion 1';
        $tarea->fecha = '2021-12-24';
        $tarea->clase_id = 1;
        $tarea->locale = 'es';
        $tarea->save();

        $tarea = new Tarea();
        $tarea->nombre = 'Tarea 2';
        $tarea->descripcion = 'Descripcion 2';
        $tarea->fecha = '2021-12-24';
        $tarea->clase_id = 1;
        $tarea->locale = 'es';
        $tarea->save();

        $tarea = new Tarea();
        $tarea->nombre = 'Tarea 3';
        $tarea->descripcion = 'Descripcion 3';
        $tarea->fecha = '2021-12-24';
        $tarea->clase_id = 1;
        $tarea->locale = 'es';
        $tarea->save();

        $tarea = new Tarea();
        $tarea->nombre = 'Tarea 4';
        $tarea->descripcion = 'Descripcion 4';
        $tarea->fecha = '2021-12-24';
        $tarea->clase_id = 1;
        $tarea->locale = 'es';
        $tarea->save();

        $tareaxconquistador = new Tareaxconquistador();
        $tareaxconquistador->tarea_id = 1;
        $tareaxconquistador->conquistador = 1;
        $tareaxconquistador->save();

        $tareaxconquistador = new Tareaxconquistador();
        $tareaxconquistador->tarea_id = 2;
        $tareaxconquistador->conquistador = 1;
        $tareaxconquistador->save();

        $tareaxconquistador = new Tareaxconquistador();
        $tareaxconquistador->tarea_id = 3;
        $tareaxconquistador->conquistador = 1;
        $tareaxconquistador->save();

        $tareaxconquistador = new Tareaxconquistador();
        $tareaxconquistador->tarea_id = 4;
        $tareaxconquistador->conquistador = 1;
        $tareaxconquistador->save();

    }
}
