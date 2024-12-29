<?php

namespace App\Http\Middleware;

use Closure;

class EnsureClientIsAuthenticated
{
    public function handle($request, Closure $next)
    {
        $cliente = $request->route('cliente');
        if ($cliente->id_cliente !== auth()->id()) {
            abort(403, 'No tienes permiso para ver estos productos.');
        }

        return $next($request);
    }
}
