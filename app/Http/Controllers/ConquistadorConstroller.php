<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conquistador;
use Illuminate\Support\Facades\DB;

class ConquistadorConstroller extends Controller
{
    public function show($id)
    {
        $conquistadores = DB::table('vw_conquistador')->where('id', $id)->get();

        return view('conquistador', ['conquistadores' => $conquistadores]);
    }

    public function invoke()
    {
        $conquistadores = DB::table('vw_conquistador')->get();

        return view('conquistador', ['conquistadores' => $conquistadores]);
    }
}
