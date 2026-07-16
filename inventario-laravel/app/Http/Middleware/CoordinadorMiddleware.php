<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Restringe el acceso a los usuarios que no tengan el rol de coordinador.
 */
class CoordinadorMiddleware
{
    /**
     * Maneja la petición entrante y valida si el usuario tiene permisos de coordinador.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'coordinador') {
            return $next($request);
        }

        abort(403, 'No tienes los permisos necesarios.');
    }
}
