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
use App\Models\Onecodeuse;
class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        // Obtenidos mediante jquery
        //$paises = Pais::all(); // Retrieve all countries from the database,
        //return view('register', ['paises' => $paises]);
        $status = 'nada';
        return view('register', compact('status'));
    }

    public function registerFromTutor($id)
    {
        $tutor = User::find($id);
        $status = 'tutor';
        //max of 5 codes per user
        $count = Onecodeuse::where('user_id', $tutor->id)->count();
        if ($count >= 5) {
            $pupilosSinAceptar = conquistador::where('tutorlegal_id', $tutor->id)->where('aceptado', 0)->get();
            $codigos = Onecodeuse::where('user_id', $tutor->id)->get();
            $onecode = $codigos->first();
            return view('register', compact('onecode', 'status'));
        }
        $onecode = new Onecodeuse();
        $onecode->user_id = $tutor->id;
        $onecode->onecode = rand(100000, 999999);
        $onecode->used = 0;
        $onecode->save();
        return view('register', compact('onecode', 'status'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Users',
            'password' => 'required|string|min:8',
            'telefono' => 'required|string|max:10',
            'fecha_nacimiento' => 'required|date_format:Y/m/d|after:1900/01/01|before:today',
            'calle' => 'required|string|max:255',
            'numero_exterior' => 'required|string|max:255',
            'numero_interior' => 'nullable|string|max:255',
            'colonia' => 'required|string|max:255',
            'ciudad_id' => 'required|integer',
            'codigo_postal' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'onecode' => 'required|integer',
            'clubes' => 'required|integer',
        ]);

        //check if onecode is valid and not used
        $onecode = Onecodeuse::where('onecode', $request->onecode)->where('used', 0)->first();
        if ($onecode == null) {
            return view('register')->with('error', 'OTC no válido o ya usado');
        }else if ($onecode->used == 1) {
            return view('register')->with('error', 'OTC ya usado');
        } else {
            $onecode->used = 1;
            $tutorid = Onecodeuse::find($request->onecode)->user_id;
            $onecode->softDelete();
            $onecode->save();
        }

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

        if ($request->autorizado == "1") {
            $conquistador = Conquistador::create([
                'user_id' => $user->id,
                'tutorLegal_id' => $request->tutorLegal_id,
                'rol' => 'Amigo',
                'activo' => '1',
            ]);
            $clubXpersona = ClubXpersona::create([
                'club_id' => $request->clubes,
                'user_id' => $user->id,
            ]);

            auth()->login($user);
            return redirect()->action([ConquistadorController::class, 'invoke']);
        } else {
            $conquistador = Conquistador::create([
                'user_id' => $user->id,
                'tutorLegal_id' => $tutorid,
                'rol' => 'Amigo',
                'activo' => '0',
            ]);
            $clubXpersona = ClubXpersona::create([
                'club_id' => $request->clubes,
                'user_id' => $user->id,
            ]);

            auth()->login($user);
            return redirect()->action([ConquistadorController::class, 'invoke']);
        }
    }
}
