<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function nosotros(){
        return view('nosotros',['carrito' => $this->carrito()]);
    }
    function locales()
    {
        return view('locales');
    }

    public function home()
    {
        $parametros=['productos' => Producto::take(3)->get(),'categorias'=>categoria::all(),'carrito' => $this->carrito()];
        return view('home', $parametros);
    }

}
