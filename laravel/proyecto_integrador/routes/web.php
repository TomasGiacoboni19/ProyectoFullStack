<?php

use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductosxCliente;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriasController;

Route::get('/', function () {
    $parametros = ['productos' => Producto::take(3)->get()];
    return view('home', $parametros);
});
Route::get('/',[CategoriasController::class,'home']);

Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->middleware('auth');
Route::put('/productos/{producto}/editar', [ProductoController::class, 'update']);
Route::get('/productos/crear', [ProductoController::class, 'create'])->middleware('auth');
Route::post('/productos/crear', [ProductoController::class, 'store']);
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->middleware('auth');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy']);

Route::get('/clientes/registro', [ClienteController::class, 'create']);
Route::post('/clientes/registro', [ClienteController::class, 'store']);

Route::get('/clientes/{cliente}/productos', [ProductosxCliente::class, 'show']);
Route::get('/clientes/{cliente}/pedidos', [PedidoController::class, 'index']);
Route::get('/clientes/{cliente}', [ClienteController::class, 'show']);



Route::get('/categorias',[CategoriasController::class,'index']);
Route::get('/categorias/{categoria}',[CategoriasController::class,'show']);



Route::get('/login', [ClienteController::class, 'login'])->name('login');
Route::post('/login', [ClienteController::class, 'authenticate']);
Route::get('/logout', [ClienteController::class, 'logout']);


Route::get('/pedidos/exportar', [PedidoController::class, 'exportar'])->name('pedidos.exportar');
Route::get('/pedidos/{pedido}', [PedidoController::class, 'show']);
Route::post('/pedidos/{pedido}/productos', [PedidoController::class, 'agregarProducto']);
Route::delete('/pedidos/{pedido}/items/{item}', [PedidoController::class, 'eliminarItem']);
Route::put('/pedidos/{pedido}/entregado', [PedidoController::class, 'entregado']);


Route::get('/pagos/{pedido}/seleccionar', [PagoController::class, 'seleccionarMetodo']);
Route::post('/pagos/{pedido}', [PagoController::class, 'generarPago']);

Route::get('/nosotros',[HomeController::class,'nosotros']);
Route::get('/locales',[HomeController::class,'locales']);


