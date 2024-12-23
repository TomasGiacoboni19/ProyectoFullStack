<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        return view('categorias.categorias', ['categorias' => Categoria::all()]);
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.categoria', ['categoria' => $categoria]);
    }

}
