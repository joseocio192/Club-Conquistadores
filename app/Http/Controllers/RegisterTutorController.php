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

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'telefono' => 'required|string|max:10',
            'fecha_nacimiento' => 'required|date',
            'calle' => 'required|string|max:255',
            'numero_exterior' => 'required|string|max:255',
            'numero_interior' => 'nullable|string|max:255',
            'colonia' => 'required|string|max:255',
            'ciudad' => 'required|integer',
            'codigo_postal' => 'required|string|max:5',
            'sexo' => 'required|string',
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
            'ciudad_id' => $request->ciudad,
            'codigo_postal' => $request->codigo_postal,
            'locale' => app()->getLocale(),
            'sexo' => $request->sexo,
            'rol' => $this->getAllowedRoles(),
        ]);

        auth()->login($user);
        return redirect()->route('tutor');
    }

    public function getAllowedRoles(): string
    {
        switch (app()->getLocale()) {
            case 'en':
                return 'tutor';
            case 'es':
                return 'tutor';
            case 'fr':
                return 'tuteur';
            case 'ko':
                return '가정 교사';
            case 'ja':
                return 'チューター';
            case 'zh-hans':
                return '导师';

            default:
                return 'tutor';
        }
    }
}
