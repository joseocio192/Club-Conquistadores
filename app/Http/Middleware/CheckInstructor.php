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
        if (!Auth::check()) { // I added this check to make sure the user is logged in
            return redirect($loginurl)->withErrors($permisos);
        }
        $user = Auth::user();
        if ($user->rol != 'instructor') {
            return redirect($loginurl)->withErrors($permisos);
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
