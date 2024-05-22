<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clubs;
use App\Models\ClubXpersona;
use App\Models\Instructor;

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
        $club->locale = 'es';
        $club->save();

        $clubxpersona = new Clubxpersona();
        $clubxpersona->club_id = 1;
        $clubxpersona->user_id = 1;
        $clubxpersona->activo = 1;
        $clubxpersona->save();

        $clubxpersona = new Clubxpersona();
        $clubxpersona->club_id = 1;
        $clubxpersona->user_id = 2;
        $clubxpersona->activo = 1;
        $clubxpersona->save();

        $clubxpersona = new Clubxpersona();
        $clubxpersona->club_id = 1;
        $clubxpersona->user_id = 3;
        $clubxpersona->activo = 1;
        $clubxpersona->save();

        $clubxpersona = new Clubxpersona();
        $clubxpersona->club_id = 1;
        $clubxpersona->user_id = 4;
        $clubxpersona->activo = 1;
        $clubxpersona->save();

        $instructor = new Instructor();
        $instructor->user_id = 3;
        $instructor->jefe_id = 1;
        $instructor->activo = 1;
        $instructor->save();
    }
}
