<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Controllers\Middleware;

class CalcularTotalCarrito extends Middleware
{
    public function handle($request, Closure $next)
    {
        $carrito = session()->get('carrito', []);
        $total = 0;

        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        // Compartir la variable $totalCarrito con las vistas
        view()->share('totalCarrito', $total);

        return $next($request);
    }
}
