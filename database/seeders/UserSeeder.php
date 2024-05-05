<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Ilufote';
        $user->apellido = 'garcia';
        $user->email = 'aaaaa@outlook.com';
        $user->password = bcrypt('12345678');
        $user->telefono = '1234567890';
        $user->fecha_nacimiento = '2000-01-01';
        $user->Calle = 'Calle';
        $user->numero_exterior = '123';
        $user->numero_interior = '123';
        $user->colonia = 'Colonia';
        $user->ciudad_id = 1;
        $user->codigo_postal = '12345';
        $user->sexo = 'Hombre';
        $user->rol = 'conquistador';
        $user->Vigente = 1;
        $user->locale = 'es';
        $user->save();

        $user = new User();
        $user->name = 'Saul';
        $user->apellido = 'Llanes';
        $user->email = 'saulllanes@outlook.com';
        $user->password = bcrypt('12345678');
        $user->telefono = '6675463263';
        $user->fecha_nacimiento = '2000-01-01';
        $user->Calle = 'Calle';
        $user->numero_exterior = '123';
        $user->numero_interior = '123';
        $user->colonia = 'Colonia';
        $user->ciudad_id = 1;
        $user->codigo_postal = '12345';
        $user->sexo = 'Hombre';
        $user->rol = 'tutor';
        $user->locale = 'es';
        $user->save();
    }
}
