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
                return redirect()->action([ConquistadorController::class, 'invoke']);
            }
            if ($user->rol == 'instructor') {
                return redirect()->action([InstructorController::class, 'index']);
            }
            if ($user->rol == 'tutor') {
                return redirect()->action([TutorController::class, 'index']);
            }
            if ($user->rol == 'directivo') {
                return redirect()->action([DirectivoController::class, 'index']);
            }

            return redirect()->intended('welcome');
        }

        return back()->withErrors([
            'email' => trans('app.the_provided_credentials_do_not_match_our_records'),
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
