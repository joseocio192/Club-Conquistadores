<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->rol != 'instructor') {
            return redirect($loginurl)->withErrors($permisos);
        }
        // userId hace referencia al id del instructor de la ruta
        $userId = $request->route('id'); // obtén el ID del usuario de la ruta
        $authenticatedUserId = auth()->user()->id; // obtén el ID del usuario autenticado
        $instructor = DB::table('vw_instructor')->where('uid', $authenticatedUserId)->first();

        if ($instructor === null) {
            // maneja el caso en que no se encuentra el instructor
            return redirect($loginurl)->withErrors($permisos);
        } else {
            $instructorid = $instructor->id;
        }

        if ($userId != $instructorid) {
            // si los IDs no coinciden, redirige al usuario
            return redirect($loginurl)->withErrors($permisos . ", Usuario al que intentas entrar: " . $userId . ", usuario que eres: " . $instructorid);
        }

        return $next($request);
    }
}
