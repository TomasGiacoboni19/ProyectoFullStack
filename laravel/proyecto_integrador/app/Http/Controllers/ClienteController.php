<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $parametros = ['usuarios' => Cliente::all()];
        return view('clientes.clientes',  $parametros);
    }


    public function create(){
        return view("clientes.crear_cliente");
    }

    public function store(Request $request)
    {


    }

    public function show(Cliente $cliente)
    {

        return view('clientes.cliente', ['cliente' => $cliente]);

    }

    public function login()
    {
        return view("clientes.login");
    }

    public function authenticate(Request $request)
    {
        $datos = $request->validate([
            "email" => ['required'],
            "password" => ['required']
        ]);

        if(auth()->attempt(["mail" => $datos["email"], "password" => $datos["password"]])){
            return response()->redirectTo("/productos");
        }
        else{
            return response()->redirectTo("/login")->with("fail", "Hubo un error al acreditarse!");
        }

    }

    public function logout(){
        auth()->logout();
        return response()->redirectTo("/");
    }

}
