<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use App\Models\Conquistador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tarea;

class ConquistadorController extends Controller
{
    public function show($id)
    {
        $conquistador = DB::table('vw_conquistador')->where('id', $id)->first();

        return view('conquistador', ['conquistador' => $conquistador]);
    }

    public function invoke()
    {
        $userId = auth()->user()->id;
        $conquistador = Conquistador::where('user_id', $userId)->first();
        $clasesConquistador = $conquistador->clases;
        $status = 'nada';
        return view('conquistador', compact('clasesConquistador', 'conquistador', 'status'));
    }

    public function clases($id)
    {
        $userId = auth()->user()->id;
        $conquistador = Conquistador::where('user_id', $userId)->first();
        $clasesConquistador = $conquistador->clases;
        $clase = Clase::find($id);
        $status = 'clase';
        $tareas = Tarea::where('clase_id', $id)->get();
        return view('conquistador', compact('clasesConquistador', 'conquistador', 'clase', 'status', 'tareas'));
    }

    public function tarea($id)
    {
        $userId = auth()->user()->id;
        $conquistador = Conquistador::where('user_id', $userId)->first();
        $status = "Mostar Tarea";
        $tarea = Tarea::find($id);
        $clasesConquistador = $conquistador->clases;
        return view('conquistador', compact('conquistador', 'status', 'tarea', 'clasesConquistador'));
    }
}
