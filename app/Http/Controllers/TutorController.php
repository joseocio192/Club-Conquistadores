<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conquistador;
use Database\Seeders\conquistadorSeeder;

class TutorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pupilos = conquistador::where('tutorlegal_id', $user->id)->where('aceptado', 1)->get();
        $status = 'nada';
        $pupilosSinAceptar = conquistador::where('tutorlegal_id', $user->id)->where('aceptado', 0)->get();
        return view('tutor', compact('user', 'pupilos', 'status', 'pupilosSinAceptar'));
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
}
