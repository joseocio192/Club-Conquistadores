<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Conquistador;
use Illuminate\Support\Facades\DB;
use App\Models\Tarea;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Log;
use App\Models\Onecodeuse;
use Illuminate\Http\Request;


class ConquistadorController extends Controller
{
    public function show($id)
    {
        $user = auth()->user();
        $conquistador = DB::table('vw_conquistador')->where('id', $id)->first();
        $historial = $user->club;
        return view('conquistador', compact('conquistador', 'historial'));
    }

    public function invoke()
    {
        $user = auth()->user();
        $userId = auth()->user()->id;
        $conquistador = Conquistador::where('user_id', $userId)->first();
        $clasesConquistador = $conquistador->clases;
        $status = 'nada';
        $historial = $user->club;
        return view('conquistador', compact('clasesConquistador', 'conquistador', 'status', 'historial'));
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
    public function sendcode(Request $request)
    {
        Log::info('Enviando código');
        $userId = auth()->user()->id;
        $user = auth()->user();
        $conquistador = Conquistador::where('user_id', $userId)->first();
        $onecodeuse = Onecodeuse::where('onecode', $request->onecode)->first();
        if ($onecodeuse && !$onecodeuse->used) {
            $onecodeuse->used = true;
            $onecodeuse->save();
            $conquistador->tutorLegal_id = $onecodeuse->id_user;
            $conquistador->save();
        }else{
            Log::info('Código inválido');
            return redirect()->route('conquistador')->with('Código inválido');
        }
        $clasesConquistador = $conquistador->clases;
        $status = 'nada';
        $historial = $user->club;
        return view('conquistador', compact('clasesConquistador', 'conquistador', 'status', 'historial'));

    }
}
