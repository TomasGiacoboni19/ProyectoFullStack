<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\ProductoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


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

        $pedido->agregarOActualizarItem($paramatros);

        $producto->modificarStock($paramatros['cantidad']);

        return redirect('/productos')->with('success', 'Producto agregado al pedido!');
    }




}
