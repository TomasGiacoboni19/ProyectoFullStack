<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function index()
    {
        $paramatros = ['productos' => Producto::all()];

        return view('productos.productos', $paramatros); //Le mando todos los productos
    }



    public function create()
    {
        $parametros = ['categorias' => Categoria::all()];
        return view("productos.crear_producto", $parametros); //Le mando todos los productos

    }


    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio_producto' => 'required|numeric|min:0',
            'stock_producto' => 'required|integer|min:0',
            'categoria_id' => 'required',
            'foto_producto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'vendedor_id' => 'required',
        ], [
            "nombre_producto.required" => "¡Nombre del producto es obligatorio!",
            "precio_producto.required" => "¡Precio del producto es obligatorio!",
            "categoria.required" => "¡Categoría del producto es obligatorio!",
            "foto.required" => "¡Foto del producto es obligatorio!"
        ]);

        // Primero tengo que guardar la imagen

        $pathFoto = $request->file('foto_producto')->store('fotos', 'public');

        $datos['foto_producto'] = $pathFoto;

        Producto::create($datos);

        return response()->redirectTo("/productos");
    }


    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        $pedido = Pedido::obtenerPedido( auth()->id() );

        $paramatros = ['producto' => $producto, 'pedido' => $pedido];

        return view('productos.producto', $paramatros);

    }



    public function edit(Producto $producto)
    {
        return view("productos.editar_producto", ["producto" => $producto]);
    }


    public function update(Request $request, Producto $producto)
    {
        $datos = $request->validate([
            "nombre_producto" => ["required"],
            "precio_producto" => ["required"],
            "stock" => ["required"]

        ], [
            "nombre_producto.required" => "Este campo es obligatorio!",
            "precio_producto.required" => "Este campo es obligatorio!"
        ]);

        $producto->nombre_producto = $datos["nombre_producto"];
        $producto->precio_producto = $datos["precio_producto"];
        $producto->stock_producto += $datos["stock"];

        $producto->save();

        return redirect("/productos/".$producto->id_producto)->with("success", "Se actualizo el producto de forma correcta");
    }


    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            return redirect()->back()->with('success', 'Se elimino correctamente.');
        } catch (Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage());
        }
    }


}
