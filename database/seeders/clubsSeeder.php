<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clubs;

class clubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $club = new Clubs();
        $club->ciudad_Id = 1;
        $club->nombre = 'Club de Futbol';
        $club->especialidad_Id = 1;
        $club->director_Id = 1;
        $club->calle = 'Calle 1';
        $club->numero_exterior = '123';
        $club->numero_interior = 'A';
        $club->colonia = 'Colonia 1';
        $club->lema = 'Lema 1';
        $club->logo = 'logo1.jpg';
        $club->especialidad = 'Futbol';
        $club->locale = 'es';
        $club->save();

    }
}
