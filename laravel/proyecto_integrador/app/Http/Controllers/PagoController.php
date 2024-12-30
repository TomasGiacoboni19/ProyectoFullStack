<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Direccion;
use App\Models\Localizacion;
use App\Models\medioDePago;
use App\Models\Pedido;
use App\Service\Notificacion\Gmail\Gmail;
use DateTime;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\MagicConst\Dir;

class PagoController extends Controller
{

    public function seleccionarMetodo(Pedido $pedido)
    {
        $mediosDePago = medioDePago::all();
        $favoritos = Direccion::where('cliente_id', auth()->id())->get();
        $localizaciones = Localizacion::all();

        $parametros = [
            'pedido' => $pedido,
            'localizaciones' => $localizaciones,
            'favoritos' => $favoritos,
            'medioDePagos' => $mediosDePago,
            'carrito' => $this->carrito(),
        ];

        return view('pedidos.generar_pago', $parametros);
    }

    public function generarPago(Pedido $pedido, Request $request)
    {

        $datos = $request->validate([
            "metodo" => ['required'],
            'favoritos' => ['required'],
            'direccion' => 'nullable|string',
            'numero' => 'nullable|string',
            'localizacion' => 'nullable|exists:localizacion,id_localizacion',
        ]);

        $direccion = Direccion::obtenerDireccion($datos);

        $pedido->direccion_entrega_id = $direccion->id_direccion;
        $pedido->medio_pago_id = $datos['metodo'];
        $pedido->carritoDisponible = 0;
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $pedido->fecha_pago = date('Y-m-d H:i:s');
        $pedido->save();

        $cliente = Cliente::find(auth()->id());

        $paramatros = [
            'destinatario' => $cliente->mail,
            'plantilla' => "emails.compra",
            'contenido' => ['pedido' => $pedido, 'cliente' => $cliente],
        ];
        Gmail::enviar($paramatros);

        return view('pedidos.pago_realizado', [ 'pedido' => $pedido, 'carrito' => $this->carrito()]);
    }
}
