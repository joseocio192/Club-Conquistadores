<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
        $user->locale = 'es';
        $user->sexo = 'Hombre';
        $user->rol = 'conquistador';
        $user->Vigente = 1;
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
        $user->locale = 'es';
        $user->sexo = 'Hombre';
        $user->rol = 'tutor';
        $user->save();

        $user = new User();
        $user->name = 'Astro';
        $user->apellido = 'Rodriguez';
        $user->email = 'astro@gmail.com';
        $user->password = bcrypt('12345678');
        $user->telefono = '6675463263';
        $user->fecha_nacimiento = '2001-12-24';
        $user->Calle = 'Calle';
        $user->numero_exterior = '123';
        $user->colonia = 'Colonia';
        $user->ciudad_id = 1;
        $user->codigo_postal = '80020';
        $user->locale = 'es';
        $user->sexo = 'Hombre';
        $user->rol = 'instructor';
        $user->save();

        $directivo = new User();
        $directivo->name = 'Directivo';
        $directivo->apellido = 'Directivo';
        $directivo->email = 'direvtivo@gmail.com';
        $directivo->password = bcrypt('12345678');
        $directivo->telefono = '6675463263';
        $directivo->fecha_nacimiento = '2001-12-24';
        $directivo->Calle = 'Calle';
        $directivo->numero_exterior = '123';
        $directivo->colonia = 'Colonia';
        $directivo->ciudad_id = 1;
        $directivo->codigo_postal = '80020';
        $directivo->locale = 'es';
        $directivo->sexo = 'Hombre';
        $directivo->rol = 'directivo';
        $directivo->save();

        $directivo = new \App\Models\Directivo();
        $directivo->user_id = 4;
        $directivo->jefe_id = 1;
        $directivo->locale = 'es';
        $directivo->rol = 'Director';
        $directivo->activo = 1;
        $directivo->save();

        $user = new User();
        $user->name = 'Jose';
        $user->apellido = 'Ocio';
        $user->email = 'ocio@gmail.com';
        $user->password = bcrypt('12345678');
        $user->telefono = '6672318213';
        $user->fecha_nacimiento = '2000-01-01';
        $user->Calle = 'Calle';
        $user->numero_exterior = '123';
        $user->numero_interior = '123';
        $user->colonia = 'Colonia';
        $user->ciudad_id = 1;
        $user->codigo_postal = '12345';
        $user->locale = 'es';
        $user->sexo = 'Hombre';
        $user->rol = 'conquistador';
        $user->Vigente = 1;
        $user->save();

        User::factory()->count(20)->create();
    }
}
