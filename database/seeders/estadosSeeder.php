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
    }
}
