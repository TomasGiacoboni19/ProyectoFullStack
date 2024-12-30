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
        $paramatros = ['productos' => Producto::all(), 'carrito' => $this->carrito()];

        return view('productos.productos', $paramatros); //Le mando todos los productos
    }

    public function create()
    {
        $parametros = ['categorias' => Categoria::all(), 'carrito' => $this->carrito()];
        return view("productos.crear_producto", $parametros);

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
            'descripcion_producto' => 'required',
        ], [
            "nombre_producto.required" => "¡Nombre del producto es obligatorio!",
            "precio_producto.required" => "¡Precio del producto es obligatorio!",
            "categoria.required" => "¡Categoría del producto es obligatorio!",
            "foto.required" => "¡Foto del producto es obligatorio!",
            "descripcion_producto.required" => "¡Descripción del producto es obligatoria!" 
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
        return view("productos.editar_producto", ["producto" => $producto, 'carrito' => $this->carrito()]);
    }

    public function update(Request $request, Producto $producto)
    {
        $datos = $request->validate([
            "nombre_producto" => ["nullable", "string"],
            "precio_producto" => ["nullable", "numeric"],
            "stock" => ["nullable", "integer"],
            "descripcion_producto" => ["nullable", "string"]
        ]);

        if (isset($datos["nombre_producto"])) {
            $producto->nombre_producto = $datos["nombre_producto"];
        }
    
        if (isset($datos["precio_producto"])) {
            $producto->precio_producto = $datos["precio_producto"];
        }
    
        if (isset($datos["stock"])) {
            $producto->stock_producto = $datos["stock"];
        }
    
        if (isset($datos["descripcion_producto"])) {
            $producto->descripcion_producto = $datos["descripcion_producto"];
        }

        $producto->save();

        return response()->json([
            'id_producto' => $producto->id_producto,
            'nombre_producto' => $producto->nombre_producto,
            'precio_producto' => $producto->precio_producto,
            'stock' => $producto->stock_producto,
            'descripcion_producto' => $producto->descripcion_producto
        ]);
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

    public function json($id) {
        $producto = Producto::where('id_producto', $id)->first();
        if ($producto) {
            // Devuelve el producto en formato JSON
            return response()->json($producto);
        } else {
            // Devuelve un error 404 si el producto no existe
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
    }
}