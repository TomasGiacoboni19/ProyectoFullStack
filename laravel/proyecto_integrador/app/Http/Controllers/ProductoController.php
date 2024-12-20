<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {

        $paramatros = ['productos' => Producto::all()];

        return view('productos.productos', $paramatros); //Le mando todos los productos
    }


    public function create()
    {
        return view("productos.crear_producto"); //Le mando todos los productos

    }


    public function store(Request $request)
    {
        $datos = $request->validate([
            "nombre_producto" => ["required"],
            "precio_producto" => ["required"],
            "stock_producto" => ["required"],
        ], [
            "nombre_producto.required" => "Este campo es obligatorio!",
            "precio_producto.required" => "Este campo es obligatorio!"
        ]);

        Producto::create($datos);

        return response()->redirectTo("/productos");
    }


    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);

        $paramatros = ['producto' => $producto];

        return view('productos.producto', $paramatros);

    }

    public function getproductoSeleccionado(){
        $paramatros = ['producto' => null];

        return view('productos.productoSeleccionado',$paramatros);
    }


    public function postproductoSeleccionado(Request $request)
    {
        $datos = $request->validate([
            "nombre_producto" => ["required"],
        ],
            ["nombre_producto.required" => "Este campo es obligatorio!",]
        );

        $producto = Producto::productoSeleccionado($datos["nombre_producto"]);

        return view('productos.productoSeleccionado', ['producto' => $producto]);
    }



    public function edit(Producto $producto)
    {
        return view("productos.editar_producto", ["producto" => $producto]);
    }


    public function update(Request $request, Producto $producto)
    {
        $datos = $request->validate([
            "nombre_producto" => ["required"],
            "precio_producto" => ["required"]
        ], [
            "nombre_producto.required" => "Este campo es obligatorio!",
            "precio_producto.required" => "Este campo es obligatorio!"
        ]);

        $producto->nombre_producto = $datos["nombre_producto"];
        $producto->precio_producto = $datos["precio_producto"];

        $producto->save();

        return redirect("/productos")->with("success", "Se actualizo el producto de forma correcta");
    }


    public function destroy(string $id)
    {
        //
    }


}
