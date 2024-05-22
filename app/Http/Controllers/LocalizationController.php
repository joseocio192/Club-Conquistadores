<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function set_Lang(Request $request, $locale = 'en')
    {

        App::setLocale($locale);

        session()->put('locale', $locale);


        return redirect()->back();
    }
}
