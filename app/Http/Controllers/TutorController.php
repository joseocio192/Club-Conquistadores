<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conquistador;
use App\Models\Onecodeuse;

class TutorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pupilos = conquistador::where('tutorlegal_id', $user->id)->where('aceptado', 1)->get();
        $status = 'nada';
        $pupilosSinAceptar = conquistador::where('tutorlegal_id', $user->id)->where('aceptado', 0)->get();
        $codigos = Onecodeuse::where('user_id', $user->id)->get();
        return view('tutor', compact('user', 'pupilos', 'status', 'pupilosSinAceptar', 'codigos'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $pupilos = conquistador::where('tutorlegal_id', $user->id)->get();
        $hijo = Conquistador::find($id);
        $status = 'show';
        return view('tutor', compact('user', 'pupilos', 'hijo', 'status'));
    }

    public function aceptar(Request $request)
    {
        $user = Auth::user();
        $pupilos = conquistador::where('tutorlegal_id', $user->id)->get();
        $status = 'nada';
        $aceptado = conquistador::find($request->idpupilo);
        $aceptado->aceptado = 1;
        $aceptado->save();
        $pupilosSinAceptar = conquistador::where('tutorlegal_id', $user->id)->where('aceptado', 0)->get();
        return view('tutor', compact('user', 'pupilos', 'status', 'pupilosSinAceptar'));
    }

    public function generateOneTimeCode()
    {
        $user = Auth::user();
        $pupilos = conquistador::where('tutorlegal_id', $user->id)->get();
        $status = 'nada';
        $codigo = rand(100000, 999999);
        //max of 5 codes per user
        $count = Onecodeuse::where('user_id', $user->id)->count();
        if ($count >= 5) {
            $pupilosSinAceptar = conquistador::where('tutorlegal_id', $user->id)->where('aceptado', 0)->get();
            $codigos = Onecodeuse::where('user_id', $user->id)->get();
            return view('tutor', compact('user', 'pupilos', 'status', 'pupilosSinAceptar', 'codigos'));
        }
        $onecodeuse = new Onecodeuse();
        $onecodeuse->user_id = $user->id;
        $onecodeuse->onecode = $codigo;
        $onecodeuse->used = 0;
        $onecodeuse->save();
        $pupilosSinAceptar = conquistador::where('tutorlegal_id', $user->id)->where('aceptado', 0)->get();
        $codigos = Onecodeuse::where('user_id', $user->id)->get();

        return view('tutor', compact('user', 'pupilos', 'status', 'pupilosSinAceptar', 'codigos'));
    }
}
