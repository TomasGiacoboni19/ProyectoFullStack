<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\ProductoItem;
use Illuminate\Http\Request;


class CarritoController extends Controller
{
    public function agregarProducto(Request $request)
    {
        $clienteId = auth()->id();
        $datos = $request->validate([
            "producto_id" => ['required'],
        ]);

        $producto = Producto::findOrFail($datos["producto_id"]);
        $pedido = Pedido::obtenerPedido($clienteId);
        ProductoItem::create($pedido->id_producto,$producto->id_pedido,1);


        return redirect('/productos')->with('success', 'Producto agregado al pedido!');
    }




}
