<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use App\Models\Clase;
use App\Models\User;


class InstructorController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $instructor = Instructor::where('user_id', $user->id)->first();
        $clasesDeInstructor = Clase::where('instructor', $instructor->id)->get();
        $status = "nada";
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

    public function anadirAlumnos(Request $request)
    {
        $clase = Clase::find($request->clase_id);
        // Check if $clase is not null
        if (!$clase) {
            return redirect()->back()->with('error', 'Invalid class ID.');
        }
        // Split the input into an array of IDs
        $conquistador_ids = explode(',', $request->alumnos);

        // Attach each Conquistador to the Clase
        foreach ($conquistador_ids as $conquistador_id) {
            // Check if the Conquistador is already attached to the Clase
            if (!$clase->conquistadores->contains(trim($conquistador_id))) {
                $clase->conquistadores()->attach(trim($conquistador_id));
            }else{
                return redirect()->back()->with('error', 'One or more students are already in the class.');
            }
        }

        return redirect()->back()->with('success', 'Students added successfully.');
    }

    public function eliminarAlumnos(Request $request)
    {
        $clase = Clase::find($request->clase_id);
        // Check if $clase is not null
        if (!$clase) {
            return redirect()->back()->with('error', 'Invalid class ID.');
        }
        // Split the input into an array of IDs
        $conquistador_ids = explode(',', $request->alumnos);

        // Detach each Conquistador from the Clase
        foreach ($conquistador_ids as $conquistador_id) {
            // Check if the Conquistador is attached to the Clase
            if ($clase->conquistadores->contains(trim($conquistador_id))) {
                $clase->conquistadores()->detach(trim($conquistador_id));
            }else{
                return redirect()->back()->with('error', 'One or more students are not in the class.');
            }
        }
        return redirect()->back()->with('success', 'Students removed successfully.');
    }
}
