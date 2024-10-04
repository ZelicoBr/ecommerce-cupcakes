<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verifica se o usuário está autenticado e se é admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Você não tem permissão para acessar essa área.');
    }
}
