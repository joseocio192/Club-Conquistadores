<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $userId = Auth::id();
            $user = User::find($userId);
            if ($user->rol == 'admin') {
                return redirect()->intended('admin');
            }
            if ($user->rol == 'conquistador') {
                return redirect()->intended('conquistador');
            }
            if ($user->rol == 'instructor') {
                return redirect()->intended('welcome');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
