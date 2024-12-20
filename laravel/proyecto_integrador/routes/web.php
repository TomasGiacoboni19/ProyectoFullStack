<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;

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
Route::get('/productos', [ProductoController::class, 'index'])->middleware('auth');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->middleware('auth');

Route::get('/login', [ClienteController::class, 'login'])->name('login');
Route::post('/login', [ClienteController::class, 'authenticate']);
Route::get('/logout', [ClienteController::class, 'logout']);

Route::get('/clientes', [ClienteController::class, 'index']); // No tiene sentido de existencia
Route::get('/clientes/{cliente}', [ClienteController::class, 'show']);


Route::post('/carrito/agregar', [CarritoController::class, 'agregarProducto'])->name('carrito.agregar');
