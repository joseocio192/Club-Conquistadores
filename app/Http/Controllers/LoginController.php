<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($attempt = Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->rol == 'admin') {
                return redirect()->intended('admin');
            }
            if ($user->rol == 'conquistador') {
                $conquistador = DB::table('vw_conquistador')->where('id', $user->id)->get();
                $conquistador = $conquistador -> last();
                return redirect()->intended(route('conquistador.show', ['id' => $conquistador->id]));
            }
            if ($user->rol == 'instructor') {
                $instructor = DB::table('vw_instructor')->where('uid', $user->id)->get();
                $instructor = $instructor -> last();
                return redirect()->intended(route('instructor.show', ['id' => $instructor->id]));
            }

            return redirect()->intended('welcome');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
