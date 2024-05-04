<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conquistador;

class ConquistadorConstroller extends Controller
{
    public function show($id)
    {
        $conquistadores = Conquistador::find($id);
        return view('conquistador', ['conquistadores' => $conquistadores]);
    }

    public function invoke()
    {
        $conquistadores = Conquistador::all();
        return view('conquistador', ['conquistadores' => $conquistadores]);
    }
}
