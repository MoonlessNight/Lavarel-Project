<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Es que redirije al usuario a dashboards si ya esta autenticado
 */
class RedirectIfAuthenticated extends Middleware
{
    public function handle(Request $request, \Closure $next, string ...$guards):\Symfony\Component\HttpFoundation\Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if(Auth::guard($guard)->check()) {
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}