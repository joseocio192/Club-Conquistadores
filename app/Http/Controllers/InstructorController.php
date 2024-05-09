<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use App\Models\Clase;
use App\Models\Clase_xalumno;
use App\Models\Conquistador;
use App\Models\Insturctor;
use App\Models\User;
use App\Models\Clubs;

class InstructorController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $instructor = Instructor::where('user_id', $user->id)->first();
        //$clasesDeInstructor = Clase::where('Instructor', $instructor->id);
        $clasesDeInstructor = Clase::where('instructor', $instructor->id)->get();
        $status = "nada";
        //$clasesDeInstructor = DB::table('Clase')->where('instructor', $instructor->id)->get();
        return view('instructor', compact('instructor', 'clasesDeInstructor', 'user', 'status'));
    }


    public function clases($id)
    {
        $user = auth()->user();
        $instructor = Instructor::where('user_id', $user->id)->first();
        $clase = Clase::find($id);
        $conquistadores = $clase->conquistadores;
        $clasesDeInstructor = Clase::where('instructor', $instructor->id)->get();
        $status = "clase";
        return view('instructor', compact('clase', 'conquistadores', 'clasesDeInstructor', 'user', 'status'));
    }

    public function crear()
    {
        $user = auth()->user();
        $instructor = Instructor::where('user_id', $user->id)->first();
        $clasesDeInstructor = Clase::where('instructor', $instructor->id)->get();
        $status = "crear";
        return view('instructor', compact('clasesDeInstructor', 'user', 'status'));
    }

    public function crearClase(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'nombre' => 'required',
            'color' => 'required',
            'logo' => 'required',
            'horario' => 'required',
        ]);
        $instructor = Instructor::where('user_id', $user->id)->first();
        $clase = new Clase();
        $clase->club_id = User::find($user->id)->clubes->first()->id;
        $clase->instructor = $instructor->id;
        $clase->nombre = $request->nombre;
        $clase->color = $request->color;
        $clase->logo = $request->logo;
        $clase->horario = $request->horario;
        $clase->locale = 'es';
        $clase->save();
        $clasesDeInstructor = Clase::where('instructor', $instructor->id)->get();
        $status = "clase";
        $conquistadores = $clase->conquistadores;

        return view('instructor', compact('clase', 'conquistadores', 'clasesDeInstructor', 'user', 'status'));
    }

    public function eliminarClase(Request $request)
    {
        $user = auth()->user();
        $instructor = Instructor::where('user_id', $user->id)->first();
        $clase = Clase::find($request->clase_id);
        if ($clase) {
            $clase->delete();
        }
        $clasesDeInstructor = Clase::where('instructor', $instructor->id)->get();
        $status = "crear";
        return view('instructor', compact('clasesDeInstructor', 'user', 'status'));
    }
}
