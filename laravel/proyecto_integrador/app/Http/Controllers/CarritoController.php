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
        ]);

        $producto = Producto::find($datos["producto_id"]);

        $pedido = Pedido::obtenerPedido($clienteId);

        $paramatros = [
            'producto_id' => $producto->id_producto,
            'pedido_id' => $pedido->id_pedido,
            'cantidad' => 1,
            'total' => $producto->precio_producto * 1 // Cálculo del total
        ];

        $productoItem = ProductoItem::where([
            ['producto_id', '=', $paramatros['producto_id']],
            ['pedido_id', '=', $paramatros['pedido_id']],
        ])->first();


        if ($productoItem != null) {
            $productoItem->cantidad += 1;
            $productoItem->total = $producto->precio_producto * $productoItem->cantidad;
            $productoItem->save();
        } else {
            ProductoItem::create($paramatros);
        }

        $pedido->precio_total += $producto->precio_producto;
        $pedido->save();

        return redirect('/productos')->with('success', 'Producto agregado al pedido!');
    }




}
