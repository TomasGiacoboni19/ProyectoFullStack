<?php

namespace App\Http\Controllers;

use App\Models\medioDePago;
use App\Models\Pedido;
use App\Service\Notificacion\Gmail\Gmail;
use Illuminate\Http\Request;

class PagoController extends Controller
{

    public function seleccionarMetodo(Pedido $pedido)
    {
        $mediosDePago = medioDePago::all();

        $parametros = [
            'pedido' => $pedido,
            'medioDePagos' => $mediosDePago,
        ];

        return view('pedidos.generar_pago', $parametros);

    }

    public function generarPago(Pedido $pedido, Request $request)
    {

        $datos = $request->validate([
            "metodo" => ['required'],
        ]);


        $pedido->medio_pago_id = $datos['metodo'];
        $pedido->carritoDisponible = 0;
        $pedido->save();

        $paramatros = [
            'destinatario' => auth()->user()->mail(),
            'plantilla' => "emails.compra",
            'contenido' => $pedido,
        ];

     //   Gmail::enviar($paramatros);
        return view('pedidos.pago_realizado', [ 'pedido' => $pedido]);

    }




}
