<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Service\Notificacion\Gmail\Gmail;
use App\Service\Notificacion\Mensaje\MensajeBienvenida;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function create(){
        return view("clientes.crear_cliente", ['carrito' => $this->carrito()] );
    }

    public function store(Request $request)
    {

        $datos = $request->validate([
            "nombre" => ["required"],
            "apellido" => ["required"],
            "usuario" => ["required"],
            "mail" => ['required'],
            "password" => ['required'],
        ], [
            "nombre.required" => "El nombre es obligatorio!",
            "apellido.required" => "El apellido es obligatorio!",
            "mail.required" => "El mail es obligatorio!",
            "usuario.required" => "El usuario es obligatorio!",
            "password.required" => "La contraseña es obligatoria!",
        ]);

        Cliente::ExisteUsuario($datos['usuario']);

        $datos["password"] = bcrypt($datos["password"]);
        Cliente::create($datos);


        $paramatros = [
            'destinatario' => $datos['mail'],
            'plantilla' => "emails.bienvenida",
            'contenido' => ['datos'=>$datos],
        ];

        Gmail::enviar($paramatros);
        return response()->redirectTo("/login")->with("success", "Usuario creado con exito");

    }

    public function show(Cliente $cliente)
    {
        return view('clientes.cliente_perfil', ['cliente' => $cliente,'carrito' => $this->carrito()]);
    }

    public function login()
    {
        return view("login.login");
    }

    public function authenticate(Request $request)
    {
        $datos = $request->validate([
            "usuario" => ['required'],
            "password" => ['required']
        ]);

        if(auth()->attempt(["usuario" => $datos["usuario"], "password" => $datos["password"]])){
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
