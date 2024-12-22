<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductosxCliente;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->middleware('auth');
Route::put('/productos/{producto}/editar', [ProductoController::class, 'update']);
Route::get('/productos/seleccionado', [ProductoController::class, 'getproductoSeleccionado']);
Route::post('/productos/seleccionado', [ProductoController::class, 'postproductoSeleccionado']);
Route::get('/productos/crear', [ProductoController::class, 'create'])->middleware('auth');
Route::post('/productos/crear', [ProductoController::class, 'store']);
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->middleware('auth');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy']);

Route::get('/categorias',[ProductoController::class,'categorias']);
Route::get('/cliente/{cliente}/misProductos', [ProductosxCliente::class, 'show']);

Route::get('/login', [ClienteController::class, 'login'])->name('login');
Route::post('/login', [ClienteController::class, 'authenticate']);
Route::get('/logout', [ClienteController::class, 'logout']);

Route::get('/clientes', [ClienteController::class, 'index']); // No tiene sentido de existencia
Route::get('/clientes/{cliente}', [ClienteController::class, 'show']);

Route::get('/pedidos/{cliente}', [CarritoController::class, 'index']);
Route::get('/pedidos/{cliente}/{pedido}', [CarritoController::class, 'show']);


Route::post('/carrito/agregar', [CarritoController::class, 'agregarProducto'])->name('carrito.agregar');
