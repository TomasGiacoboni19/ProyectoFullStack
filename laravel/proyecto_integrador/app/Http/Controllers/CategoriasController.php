<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;

class CategoriasController extends Controller
{
    public function index()
    {
        return view('categorias.categorias', ['categorias' => Categoria::all(),'carrito' => $this->carrito()]);
    }


    public function home()
    {
        $parametros=['productos' => Producto::take(3)->get(),'categorias'=>categoria::all(),'carrito' => $this->carrito()];
        return view('home', $parametros);
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.categoria', ['categoria' => $categoria,'carrito' => $this->carrito()]);
    }

}
