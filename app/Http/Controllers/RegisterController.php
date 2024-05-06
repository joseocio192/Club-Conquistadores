<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Ciudad;
use App\Models\Conquistador;
use App\Models\Pais;
use App\Models\ClubXpersona;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $ciudades = Ciudad::all(); // Retrieve all cities from the database
        $paises = Pais::all(); // Retrieve all countries from the database
        return view('register', ['ciudades' => $ciudades, 'paises' => $paises]);
    }

    public function register(Request $request)
    {
        $request->validate([

        ]);

            $user = User::create([
                'name' => $request->name,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'telefono' => $request->telefono,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'calle' => $request->calle,
                'numero_exterior' => $request->numero_exterior,
                'numero_interior' => $request->numero_interior,
                'colonia' => $request->colonia,
                'ciudad_id' => $request->ciudad_id,
                'codigo_postal' => $request->codigo_postal,
                'sexo' => $request->sexo,
                'rol' => 'conquistador',
            ]);

            $conquistador = Conquistador::create([
                'user_id' => $user->id,
                'tutorLegal_id' => $request->tutorLegal_id,
                'rol' => 'Amigo',
            ]);
            $clubXpersona = ClubXpersona::create([
                'club_id' => $request->clubes,
                'user_id' => $user->id,
            ]);

            auth()->login($user);
            return redirect()->route('/conquistador/{id}' , ['id' => $user->id]);
    }
}
