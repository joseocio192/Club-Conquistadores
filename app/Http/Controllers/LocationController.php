<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Estados;
use App\Models\Municipio;
use App\Models\Ciudad;
use App\Models\Especialidad;

class LocationController extends Controller
{
    public function addPais(Request $request)
    {
        $pais = new Pais();
        $pais->nombre = $request->nombre;
        $pais->locale = $request->locale;
        $pais->save();
        return redirect()->back();
    }

    public function addEstado(Request $request)
    {
        $estado = new Estados();
        $estado->nombre = $request->nombre;
        $estado->pais_id = $request->pais;
        $estado->locale = $request->locale;
        $estado->save();
        return redirect()->back();
    }
    public function addMunicipio(Request $request)
    {
        $municipio = new Municipio();
        $municipio->nombre = $request->nombre;
        $municipio->pais_id = $request->pais;
        $municipio->estado_id = $request->estado;
        $municipio->locale = $request->locale;
        $municipio->save();
        return redirect()->back();
    }

    public function addCiudad(Request $request)
    {
        $ciudad = new Ciudad();
        $ciudad->nombre = $request->nombre;
        $ciudad->pais_id = $request->pais;
        $ciudad->estado_id = $request->estado;
        $ciudad->municipio_id = $request->municipio;
        $ciudad->locale = $request->locale;
        $ciudad->save();
        return redirect()->back();
    }
    public function addEspecialidad(Request $request)
    {
        $especialidad = new Especialidad();
        $especialidad->nombre = $request->nombre;
        $especialidad->locale = $request->locale;
        $especialidad->save();
        return redirect()->back();
    }
}
