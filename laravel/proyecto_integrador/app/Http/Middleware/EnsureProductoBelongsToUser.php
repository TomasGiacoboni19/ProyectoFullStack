<?php

namespace App\Http\Middleware;

use Closure;

class EnsureProductoBelongsToUser
{
    public function handle($request, Closure $next)
    {
        $producto = $request->route('producto');

        if (!$producto || $producto->cliente->id_cliente !== auth()->id()) {
            abort(403, 'No tienes permiso para acceder a este producto.');
        }

        return $next($request);
    }
}
