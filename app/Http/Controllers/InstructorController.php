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
        $alumnos = $clase->alumnos;
        $clasesDeInstructor = Clase::where('instructor', $instructor->id)->get();
        $status = "clase";
        return view('instructor', compact('clase', 'alumnos', 'clasesDeInstructor', 'user', 'status'));
    }

    public function crear()
    {
        $user = auth()->user();
        $instructor = Instructor::where('user_id', $user->id)->first();
        //$clasesDeInstructor = Clase::where('Instructor', $instructor->id);
        $clasesDeInstructor = Clase::where('instructor', $instructor->id)->get();
        $status = "crear";
        //$clasesDeInstructor = DB::table('Clase')->where('instructor', $instructor->id)->get();
        return view('instructor', compact('instructor', 'clasesDeInstructor', 'user', 'status'));
    }
}
