<?php

namespace App\Http\Middleware;

use App\Models\Pedido;
use Closure;

class EnsurePedidoBelongsToUser
{
    public function handle($request, Closure $next)
    {
        $pedido = $request->route('pedido');

        if (!$pedido || $pedido->cliente->id_cliente !== auth()->id()) {
            abort(403, 'No tienes permiso para acceder a este pedido.');
        }

        return $next($request);
    }
}
