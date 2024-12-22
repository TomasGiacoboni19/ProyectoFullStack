<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::with('categoria')->get();
        $paramatros = ['productos' => Producto::all()];

        return view('productos.productos', $paramatros); //Le mando todos los productos
    }

    public function categorias()
    {
        $parametros = ['categorias' => Categoria::all()];
        return view('productos.categorias', $parametros);
    }


    public function create()
    {
        $parametros = ['categorias' => Categoria::all()];
        return view("productos.crear_producto", $parametros); //Le mando todos los productos

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

        // $datos = $request->validate([
        //     'nombre_producto' => 'required|string|max:255',
        //     'precio_producto' => 'required|numeric|min:0',
        //     'stock_producto' => 'required|integer|min:0',
        //     'categorias' => 'required',
        //     'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // valida que sea una imagen
        // ]);


        // $rutaImagen = $request->file('foto')->store('productos', 'public');
        // $datos['foto'] = $rutaImagen; // Guardamos la ruta en la base de datos

        // // Guardar producto en la base de datos
        // Producto::create($datos);

        // return redirect()->back()->with('success', 'Producto creado correctamente.');
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
