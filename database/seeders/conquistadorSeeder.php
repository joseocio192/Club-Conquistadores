<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conquistador;

class conquistadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conquistador = new Conquistador();
        $conquistador->user_id = 1;
        $conquistador->tutorLegal_id = 2;
        $conquistador->rol = 'Amigo';
        $conquistador->save();

    }
}
