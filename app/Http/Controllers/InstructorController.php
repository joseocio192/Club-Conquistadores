<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;
use App\Models\Clase;
use App\Models\User;
use App\Models\Tarea;
use App\Models\Conquistador;
use App\Models\Asistencia;

use function PHPSTORM_META\elementType;
use Illuminate\Support\Str;

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
        $tareas = Tarea::where('clase_id', $id)->get();
        $asistencias = Asistencia::where('id_clase', $id)->get();
        return view('instructor', compact('clase', 'conquistadores', 'clasesDeInstructor', 'user', 'status', 'tareas', 'asistencias'));
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
        }else
        {
            return back()->withErrors(['clase_id' => 'Invalid class ID.']);
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
            return back()->withErrors(['clase_id' => 'Invalid class ID.']);
        }
        // Split the input into an array of IDs
        $conquistador_ids = explode(',', $request->alumnos);

        //check if ids are valid
        foreach ($conquistador_ids as $conquistador_id) {
            $conquistador = Conquistador::find($conquistador_id);
            if (!$conquistador) {
                return back()->withErrors(['alumnos' => 'Invalid student ID.']);
            }
        }

        // Attach each Conquistador to the Clase
        foreach ($conquistador_ids as $conquistador_id) {
            // Check if the Conquistador is already attached to the Clase
            if (!$clase->conquistadores->contains(trim($conquistador_id))) {
                $clase->conquistadores()->attach(trim($conquistador_id));
            } else {
                return back()->withErrors(['alumnos' => 'One or more students are already in the class.']);
            }
        }

        return redirect()->back()->with('success', 'Students added successfully.');
    }

    public function eliminarAlumnos(Request $request)
    {
        $clase = Clase::find($request->clase_id);
        // Check if $clase is not null
        if (!$clase) {
            return back()->withErrors(['clase_id' => 'Invalid class ID.']);
        }
        // Split the input into an array of IDs
        $conquistador_ids = explode(',', $request->alumnos);

        //check if ids are valid
        foreach ($conquistador_ids as $conquistador_id) {
            $conquistador = Conquistador::find($conquistador_id);
            if (!$conquistador) {
                return back()->withErrors(['alumnos' => 'Invalid student ID.']);
            }
        }

        // Detach each Conquistador from the Clase
        foreach ($conquistador_ids as $conquistador_id) {
            // Check if the Conquistador is attached to the Clase
            if ($clase->conquistadores->contains(trim($conquistador_id))) {
                $clase->conquistadores()->detach(trim($conquistador_id));
            } else {
                return back()->withErrors(['alumnos' => 'One or more students are not in the class.']);
            }
        }
        return redirect()->back()->with('success', 'Students removed successfully.');
    }

    public function sendhw(Request $request)
    {
        $clase_id = $request->clase_id;

        foreach ($request->except(['_token', 'clase_id']) as $key => $value) {
            list($tarea_id, $conquistador_id) = explode('-', $key);

            $conquistador = Conquistador::find($conquistador_id);

            if ($conquistador) {
                $conquistador->tareas()->updateExistingPivot($tarea_id, ['completada' => $value]);
            }
        }

        return redirect()->back()->with('success', 'Homework status updated successfully.');
    }

    public function crearTarea(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
        ]);

        $tarea = new Tarea();
        $tarea->clase_id = $request->clase_id;
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha = $request->fecha;
        $tarea->locale = 'es';
        $tarea->save();
        //assign the task to all students in the class
        $clase = Clase::find($request->clase_id);
        $conquistadores = $clase->conquistadores;
        foreach ($conquistadores as $conquistador) {
            $conquistador->tareas()->attach($tarea->id, ['completada' => 0]);
        }
        return redirect()->back()->with('success', 'Homework created successfully.');
    }

    public function modificarTarea(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
        ]);

        $tarea = Tarea::find($request->tarea_id);
        if (!$tarea) {
            return back()->withErrors(['tarea_id' => 'Invalid homework ID.']);
        }
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha = $request->fecha;
        $tarea->save();
        return redirect()->back()->with('success', 'Homework updated successfully.');
    }

    public function definer(Request $request)
    {
        if(isset($_POST['adddia'])){
            return $this->adddia($request);
        }else
        {
            return $this->asistencia($request);
        }
    }

    public function adddia(Request $request){
        $dia = new Asistencia();
        $dia->id_clase = $request->clase_id;
        $dia->fecha = date('Y-m-d');
        $dia->save();

        //assign the asistencia to all students in the class
        $clase = Clase::find($request->clase_id);
        $conquistadores = $clase->conquistadores;
        foreach ($conquistadores as $conquistador) {
            $conquistador->asistencia()->attach($dia->id, ['asistio' => 0, 'pulcritud' => 0]);
        }

        return redirect()->back()->with('success', 'Day added successfully.');
    }

    public function asistencia(Request $request)
    {
        // Loop through all the request data
        foreach ($request->all() as $key => $value) {
            // Check if the key starts with 'asistencia_' or 'pulcritud_'
            if (Str::startsWith($key, 'asistencia_')) {
                // Process asistencia value
                list($asistencia_id, $conquistador_id) = explode('-', Str::after($key, 'asistencia_'));
                // Find the Asistencia and update it
                $conquistador = Conquistador::find($conquistador_id);
                if ($conquistador) {
                    $conquistador->asistencia()->updateExistingPivot($asistencia_id, ['asistio' => $value]);
                }
            } elseif (Str::startsWith($key, 'pulcritud_')) {
                // Process pulcritud value
                list($asistencia_id, $conquistador_id) = explode('-', Str::after($key, 'pulcritud_'));
                // Find the Asistencia and update it
                $conquistador = Conquistador::find($conquistador_id);
                if ($conquistador) {
                    $conquistador->asistencia()->updateExistingPivot($asistencia_id, ['pulcritud' => $value]);
                }
            }
        }
        return redirect()->back()->with('success', 'Attendance updated successfully.');
    }
}
