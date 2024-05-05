<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estados;

class estadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estado = new Estados();
        $estado->pais_id = 1;
        $estado->nombre = 'Sinaloa';
        $estado->save();
        $estado = new Estados();
        $estado->nombre = 'Aguascalientes';
        $estado->pais_id = 1;
        $estado->save();
        $estado = new Estados();
        $estado->pais_id = 1;
        $estado->nombre = 'Baja California';
        $estado->save();
        $estado = new Estados();
        $estado->pais_id = 1;
        $estado->nombre = 'Baja California Sur';
        $estado->save();
        $estado = new Estados();
        $estado->pais_id = 2;
        $estado->nombre = 'Alabama';
        $estado->save();
        $estado = new Estados();
        $estado->pais_id = 2;
        $estado->nombre = 'Alaska';
        $estado->save();
        $estado = new Estados();
        $estado->pais_id = 2;
        $estado->nombre = 'Arizona';
        $estado->save();
        $estado = new Estados();
        $estado->pais_id = 3;
        $estado->nombre = 'Alberta';
        $estado->save();
        $estado = new Estados();
        $estado->pais_id = 3;
        $estado->nombre = 'British Columbia';
        $estado->save();
        $estado = new Estados();
        $estado->pais_id = 3;
        $estado->nombre = 'Manitoba';
        $estado->save();
    }
}
