<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        return view('instructor');
    }

    public function show($id)
    {
        return view('instructor', ['id' => $id]);
    }
}
