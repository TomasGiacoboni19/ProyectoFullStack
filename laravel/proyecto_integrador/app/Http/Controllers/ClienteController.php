<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = ['clientes' => Cliente::all()];
        return view('clientes.clientes',  $clientes);
    }


    public function create(){
        return view("clientes.crear_cliente");
    }

    public function store(Request $request)
    {


    }

    public function show(string $id)
    {

    }

}
