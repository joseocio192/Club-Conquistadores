<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(){
    $records = DB::table('vw_ciudadLocale')->get();

    return view('home', ['records' => $records]);
}

}
