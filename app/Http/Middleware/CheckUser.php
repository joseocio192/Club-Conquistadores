<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUser
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
        $userId = $request->route('id'); // obtén el ID del conquistador del que se quiere obtener informacion
        $authenticatedUserId = auth()->user()->id; // obtén el ID del usuario autenticado
        $conquistador = DB::table('vw_conquistador')->where('uid', $authenticatedUserId)->first();
        $conquistadorAentrar =  DB::table('vw_conquistador')->where('id', $userId)->first();

        if ($conquistadorAentrar === null) {
            return redirect($loginurl)->withErrors($permisos);
        }

        if ($conquistador === null) {
            // maneja el caso en que no se encuentra el conquistador
            return redirect($loginurl)->withErrors($permisos);
        } else {
            $conquistadoruid = $conquistador->uid;
        }
        //compara las dos uid de el conquistadorAentrar y el id del conquistador que quiere entrar
        if ($conquistadorAentrar->uid != $conquistadoruid) {
            // si los IDs no coinciden, redirige al usuario
            return redirect($loginurl)->withErrors($permisos . $userId . " " . $conquistadoruid);
        } else {
            return $next($request);
        }
    }
}
