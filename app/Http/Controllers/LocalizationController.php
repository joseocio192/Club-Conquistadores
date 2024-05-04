<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{

    public function __invoke()
    {
        return view('welcome2');
    }
    public function set_Lang(Request $request)
    {

        $locale = Session::get('locale');
        $request->validate([
            'locale' => 'required|in:en,es',
        ]);
        App::setLocale($locale);

        session()->put('locale', $locale);

        return redirect()->back();
    }

    public function setLocale(Request $request)
    {
        $locale = $request->input('language');

        session(['locale' => $locale]);
        App::setLocale($locale);
        return back();
    }
}
