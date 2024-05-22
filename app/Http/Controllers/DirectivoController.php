<?php

namespace App\Http\Controllers;

use App\Models\Clubs;
use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Especialidad;
use GuzzleHttp\TransferStats;
use Symfony\Component\Uid\NilUlid;

class DirectivoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $directivo = $user->directivo;
        $status = 'nada';
        $club = $user->directivo->club;
        return view('directivo', compact('status', 'club', 'user'));
    }

    public function stats()
    {
        $user = auth()->user();
        $directivo = $user->directivo;
        if ($directivo->ciudad_id != null) {
            return $this->ciudad();
        }
        if ($directivo->municipio_id != null) {
            return $this->municipio();
        }
        if ($directivo->estado_id != null) {
            return $this->estados();
        }
        if ($directivo->pais_id != null) {
            return $this->paises();
        }
        if ($directivo->mundial != null) {
            return $this->mundial();
        }
    }

    public function club($id)
    {
        $user = auth()->user();
        $status = 'club';
        $club = Clubs::find($id);
        $cantidad = $club->users->count();
        return view('directivo', compact('status', 'club', 'cantidad', 'user'));
    }

    public function ciudad()
    {
        $user = auth()->user();
        $status = 'ciudad';
        $club = $user->directivo->club;
        $ciudad = $user->directivo->ciudad;
        $clubes = $ciudad->clubs;
        $totalConquistadores = 0;
        foreach ($clubes as $club) {
            $totalConquistadores += $club->users->count();
        }
        return view('directivo', compact('status', 'ciudad', 'clubes', 'club', 'user', 'totalConquistadores'));
    }

    public function municipio()
    {
        $user = auth()->user();
        $status = 'municipio';
        $municipio = $user->directivo->municipio;
        $ciudades = $municipio->ciudades;
        $clubs = [];
        foreach ($ciudades as $ciudad) {
            $clubs = array_merge($clubs, $ciudad->clubs->toArray());
        }
        return view('directivo', compact('status', 'municipio', 'ciudades', 'clubs'));
    }

    public function estados()
    {
        $user = auth()->user();
        $status = 'estado';
        $estado = $user->directivo->estado;
        $municipios = $estado->municipios;
        $ciudades = [];
        $clubs = [];
        foreach ($municipios as $municipio) {
            $ciudades = array_merge($ciudades, $municipio->ciudades->toArray());
        }
        foreach ($ciudades as $ciudad) {
            $clubs = array_merge($clubs, $ciudad->clubs->toArray());
        }
        return view('directivo', compact('status', 'estado', 'municipios', 'ciudades', 'clubs'));
    }

    public function paises()
    {
        $user = auth()->user();
        $status = 'pais';
        $pais = $user->directivo->pais;
        $estados = $pais->estados;
        $municipios = [];
        $ciudades = [];
        $clubs = [];
        foreach ($estados as $estado) {
            $municipios = array_merge($municipios, $estado->municipios->toArray());
        }
        foreach ($municipios as $municipio) {
            $ciudades = array_merge($ciudades, $municipio->ciudades->toArray());
        }
        foreach ($ciudades as $ciudad) {
            $clubs = array_merge($clubs, $ciudad->clubs->toArray());
        }
        $clubsObj = (object)$clubs;
        $cantidadConquistadoresPais = $clubsObj->conquistadores->count();
        return view('directivo', compact('status', 'pais', 'estados', 'municipios', 'ciudades', 'clubs', 'cantidadConquistadoresPais'));
    }

    public function mundial()
    {
        $user = auth()->user();
        $status = 'mundial';
        $paises = Pais::all();
        $estados = [];
        $municipios = [];
        $ciudades = [];
        $clubs = [];
        foreach ($paises as $pais) {
            $estados = array_merge($estados, $pais->estados->toArray());
        }
        foreach ($estados as $estado) {
            $municipios = array_merge($municipios, $estado->municipios->toArray());
        }
        foreach ($municipios as $municipio) {
            $ciudades = array_merge($ciudades, $municipio->ciudades->toArray());
        }
        foreach ($ciudades as $ciudad) {
            $clubs = array_merge($clubs, $ciudad->clubs->toArray());
        }
        $clubsObj = (object)$clubs;
        $cantidadConquistadoresMundial = $clubsObj->conquistadores->count();
        return view('directivo', compact('status', 'paises', 'estados', 'municipios', 'ciudades', 'clubs', 'cantidadConquistadoresMundial'));
    }

    public function crearclubview()
    {
        $user = auth()->user();
        $club = $user->directivo->club;
        $status = 'crearclub';
        $pais = Pais::all();
        $especialidad = Especialidad::all();
        return view('directivo', compact('status', 'pais', 'user', 'club', 'especialidad'));
    }

    public function crearClub(Request $request)
    {
        $club = new Clubs();
        $club->nombre = $request->nombre;
        $club->especialidad_id = $request->especialidad;
        $club->directivo_id = $request->directivo_id;
        $club->calle = $request->calle;
        $club->numero_exterior = $request->numero_exterior;
        $club->numero_interior = $request->numero_interior;
        $club->colonia = $request->colonia;
        $club->lema = $request->lema;
        $club->logo = $request->logo;
        $club->pais_id = $request->pais;
        $club->estado_id = $request->estado;
        $club->municipio_id = $request->municipio;
        $club->ciudad_id = $request->ciudad;
        $club->locale = $request->locale;
        $club->save();
        return redirect()->route('directivo.index');
    }
}
