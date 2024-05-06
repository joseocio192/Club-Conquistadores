<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipioPaisController extends Controller
{
    public function __invoke()
    {
        $paises = DB::table('pais')->get();

        return view('municipios', ['paises' => $paises]);
    }
}
