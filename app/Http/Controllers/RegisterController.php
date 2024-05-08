<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Ciudad;
use App\Models\Conquistador;
use App\Models\Pais;
use App\Models\ClubXpersona;
use App\Http\Controllers\ConquistadorController;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        // Obtenidos mediante jquery
        //$paises = Pais::all(); // Retrieve all countries from the database,
        //return view('register', ['paises' => $paises]);
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([]);

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
        return redirect()->action([ConquistadorController::class, 'invoke']);
    }
}
