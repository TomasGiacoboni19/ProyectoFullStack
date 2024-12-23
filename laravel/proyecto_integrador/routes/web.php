<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductosxCliente;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

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



Route::get('/pedidos/{pedido}', [PedidoController::class, 'show']);
Route::post('/pedidos/{pedido}/productos', [PedidoController::class, 'agregarProducto']);
Route::delete('/pedidos/{pedido}/items/{item}', [PedidoController::class, 'eliminarItem']);
Route::put('/pedidos/{pedido}/entregado', [PedidoController::class, 'entregado']);


Route::get('/pagos/{pedido}/seleccionar', [PagoController::class, 'seleccionarMetodo']);
Route::post('/pagos/{pedido}', [PagoController::class, 'generarPago']);


