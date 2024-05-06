<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRol
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) // I added this check to make sure the user is logged in
            return redirect('/login');

        $user = Auth::user();

        if ($user->rol != $role) {
            // Redirect users who do not have the appropriate role...
            return redirect('/')->with('error', 'You do not have access to this page');
        }

        return $next($request);
    }
}
