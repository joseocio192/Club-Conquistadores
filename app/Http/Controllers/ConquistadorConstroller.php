<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conquistador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConquistadorConstroller extends Controller
{
    public function show($id)
    {
        $conquistador = DB::table('vw_conquistador')->where('id', $id)->first();

        return view('conquistador', ['conquistador' => $conquistador]);
    }

    public function invoke()
    {
        $userId = auth()->user()->id;
        $conquistador = DB::table('vw_conquistador')->where('uid', $userId)->first();

        return view('conquistador', ['conquistador' => $conquistador]);
    }
}
