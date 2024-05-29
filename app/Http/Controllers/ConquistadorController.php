<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Conquistador;
use Illuminate\Support\Facades\DB;
use App\Models\Tarea;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Log;


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

    public function especialidad()
    {
        $userId = auth()->user()->id;
        $conquistador = Conquistador::where('user_id', $userId)->first();
        $clasesConquistador = $conquistador->clases;
        $status = 'especialidad';
        $especialidades = Especialidad::whereHas('conquistadores', function ($query) use ($conquistador) {
            $query->where('conquistador_id', $conquistador->id);
        })->get();
        //especialidades completadas
        $especialidadesCompletadas = $especialidades->filter(function ($especialidad) use ($conquistador) {
            return $especialidad->conquistadores->find($conquistador->id)->pivot->fechaCumplido;
        });
        //especialidades sin completar
        $especialidadesNoCompletadas = $especialidades->diff($especialidadesCompletadas);

        return view('conquistador', compact('clasesConquistador', 'conquistador', 'status', 'especialidadesNoCompletadas', 'especialidadesCompletadas'));
    }
}
