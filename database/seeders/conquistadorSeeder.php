<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conquistador;

class ConquistadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conquistador = new Conquistador();
        $conquistador->user_id = 1;
        $conquistador->tutorLegal_id = 2;
        $conquistador->locale = 'es';
        $conquistador->rol = 'Amigo';
        $conquistador->save();

        $conquistador = new Conquistador();
        $conquistador->user_id = 2;
        $conquistador->tutorLegal_id = 2;
        $conquistador->locale = 'es';
        $conquistador->rol = 'Amigo';
        $conquistador->save();
    }
}
