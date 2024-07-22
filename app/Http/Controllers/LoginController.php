<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

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

            Log::info('User logged in', ['user' => $user]);

            switch ($user->rol) {
                case 'administrador':
                case 'administrator':
                case '관리자':
                case '管理员':
                case '管理者':
                case 'administrateur':
                    return redirect()->intended('administrador');
                    break;
                case 'conquistador':
                case 'conqueror':
                case '정복자':
                case '征服者':
                case 'conquérant':
                    return redirect()->action([ConquistadorController::class, 'invoke']);
                    break;
                case 'tutor':
                case '교사':
                case '导师':
                case 'チューター':
                case 'tuteur':
                    return redirect()->action([TutorController::class, 'index']);
                    break;
                case 'directivo':
                case 'managerial':
                case '이사':
                case '董事':
                case 'ディレクター':
                case 'directeur':
                    return redirect()->action([DirectivoController::class, 'index']);
                    break;
                case 'instructor':
                case '선생':
                case '教练':
                case 'インストラクター':
                case 'instructeur':
                    return redirect()->action([InstructorController::class, 'index']);
                    break;
                default:
                    return redirect()->intended('/');
                    break;
            }
            return redirect()->intended('/');
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
