<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipioPaisController extends Controller
{
    public function __invoke()
    {
        $paises = DB::table('pais')->get();
        $estados = DB::table('estados')->get();
        $municipios = DB::table('municipios')->get();
        $ciudades = DB::table('ciudad')->get();
        $clubes = DB::table('clubs')->get();
        return view('municipios', ['paises' => $paises, 'estados' => $estados, 'municipios' => $municipios, 'ciudades' => $ciudades, 'clubes' => $clubes]);
    }
}
