<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\medioDePago;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\ProductoItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class PedidoController extends Controller
{

    public function agregarProducto(Pedido $pedido,Request $request)
    {

        $datos = $request->validate([
            "producto_id" => ['required'],
            "cantidad" => ['required'],
        ]);

        $producto = Producto::find($datos["producto_id"]);

        $paramatros = [
            'producto' => $producto,
            'producto_id' => $producto->id_producto,
            'pedido_id' => $pedido->id_pedido,
            'cantidad' => $datos['cantidad'],
            'total' => $datos['cantidad'] * $producto->precio_producto
        ];

        $pedido->actualizarPedido($paramatros);
        $producto->modificarStock(-$paramatros['cantidad']);


        return redirect('/pedidos/'. $pedido->id_pedido)->with('success', 'Producto agregado al pedido!');
    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.carrito_compras', ['pedido' => $pedido,'carrito' => $this->carrito() ]);
    }

    public function index(Cliente $cliente)
    {
        return view('clientes.cliente_compras', ['pedidos' => $cliente->pedidos, 'carrito' => $this->carrito()]);
    }

    public function eliminarItem(Pedido $pedido,ProductoItem $item)
    {
        $producto = $item->producto;
        $pedido->modificarPrecio(-$item->total);
        $producto->modificarStock($item->cantidad);
        $item->delete();

        return redirect()->back()->with('success', 'Producto eliminado del carrito!');
    }


    public function entregado(Pedido $pedido)
    {
        $pedido->entregado = 1;
        $pedido->save();

        return redirect()->back()->with('success', 'Producto entregado gracias por su compra');
    }


    public function exportar()
    {
        $pedidos = Pedido::where('cliente_id', auth()->id() )->get();

        $pdf = PDF::loadView('pdf.pedidos', ['pedidos'=> $pedidos] );

        return $pdf->download('pedidos.pdf');
    }

}
