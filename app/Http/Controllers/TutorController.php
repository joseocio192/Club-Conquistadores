<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conquistador;
use Database\Seeders\conquistadorSeeder;

class TutorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pupilos = conquistador::where('tutorlegal_id', $user->id)->get();
        $status = 'nada';
        $pupilosSinAceptar = conquistador::where('tutorlegal_id', $user->id)->where('aceptado', 0)->get();
        return view('tutor', compact('user', 'pupilos', 'status'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $pupilos = conquistador::where('tutorlegal_id', $user->id)->get();
        $hijo = Conquistador::find($id);
        $status = 'show';
        return view('tutor', compact('user', 'pupilos', 'hijo', 'status'));
    }
}
