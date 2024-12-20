<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;


class CarritoController extends Controller
{

    public function agregarProducto(Request $request)
    {
        $clienteId = auth()->id();

        $datos = $request->validate([
            "producto_id" => ['required'],
            "cantidad" => ['required'],

        ]);

        $producto = Producto::find($datos["producto_id"]);
        $pedido = Pedido::obtenerPedido($clienteId);

        $paramatros = [
            'producto' => $producto,
            'producto_id' => $producto->id_producto,
            'pedido_id' => $pedido->id_pedido,
            'cantidad' => $datos['cantidad'],
            'total' => $datos['cantidad'] * $producto->precio
        ];

        $pedido->actualizarPedido($paramatros);

        $producto->modificarStock($paramatros['cantidad']);

        return redirect('/pedidos/' . $clienteId . '/' . $pedido->id_pedido)->with('success', 'Producto agregado al pedido!');
    }

    public function show(Cliente $cliente, Pedido $pedido)
    {

        $parametros = [
            'pedido' => $pedido,
            'cliente' => $cliente,
        ];

        return view('productos.carrito_compras', $parametros);
    }

    public function index(Cliente $cliente)
    {
        $pedidos = Pedido::where('cliente_id', $cliente->id_cliente)->get();

        return view('clientes.cliente_compras', ['pedidos' => $pedidos]);
    }


}
