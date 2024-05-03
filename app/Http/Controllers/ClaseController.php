<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function show($id)
    {
        return view('clases.show', ['id' => $id]);
    }
}
