<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Clase;
use App\Models\Instructor;

use Illuminate\Support\Facades\Log;

class CheckInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next)
    {
        $loginurl = '/login';
        $permisos = 'No tienes permiso para acceder a esta página. Por favor, inicia sesión';
        if (!Auth::check()) {
            return redirect($loginurl)->withErrors($permisos);
        }
        $user = Auth::user();
        Log::info('User logged in', ['user' => $user->rol]);
        switch ($user->rol) {
            case 'instructor':
            case '선생':
            case '教练':
            case 'インストラクター':
            case 'instructeur':
                break;
            default:
                return redirect($loginurl)->withErrors($permisos);
                break;
        }
        $claseId = $request->route('id');
        if (Clase::find($claseId) == null) {
            return redirect('/instructor')->withErrors($permisos);
        }

        $instructor = Instructor::where('user_id', $user->id)->first();
        if (Clase::find($claseId)->instructor != $instructor->id) {
            return redirect($loginurl)->withErrors($permisos);
        }
        return $next($request);
    }
}
