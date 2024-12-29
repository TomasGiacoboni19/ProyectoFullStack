<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsureClientIsAuthenticated;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosxCliente extends Controller
{
    public function show(Cliente $cliente) {
        $productos = Producto::where('vendedor_id', $cliente->id_cliente)->get();

        return view('productos.productos_cliente', ['productos' => $productos,'carrito' => $this->carrito()]);
    }
}
