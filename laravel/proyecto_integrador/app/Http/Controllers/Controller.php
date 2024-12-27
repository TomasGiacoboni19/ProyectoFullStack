<?php

namespace App\Http\Controllers;

use App\Models\Pedido;

abstract class Controller
{
    protected function carrito(){
        if(auth()->id() != null){
       return $pedido = Pedido::obtenerPedido(auth()->id());
        }
        return null;
    }
}
