<?php

namespace App\Http\Controllers;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterTutorController extends Controller
{
    public function showRegistrationForm()
    {
        $ciudades = Ciudad::all(); // Retrieve all cities from the database
        return view('registerTutor', ['ciudades' => $ciudades]);
    }

    public function register(Request $request){

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
            'rol' => 'tutorLegal',
        ]);

        auth()->login($user);
        return redirect()->route('users/{id}' , ['id' => $user->id]);

    }
}
