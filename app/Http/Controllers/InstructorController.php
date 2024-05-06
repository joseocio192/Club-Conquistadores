<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    public function index()
    {
        return view('instructor');
    }

    public function show($id)
    {
        $instructor = DB::table('vw_instructor')->where('id', $id)->first();
        return view('instructor', ['id' => $id], ['instructor' => $instructor]);
    }


}
