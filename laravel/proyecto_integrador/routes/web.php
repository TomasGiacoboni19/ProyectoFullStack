<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/productos/seleccionado', [ProductoController::class, 'getproductoSeleccionado']);
Route::post('/productos/seleccionado', [ProductoController::class, 'postproductoSeleccionado']);
Route::get('/productos/crear', [ProductoController::class, 'create']);
Route::post('/productos/crear', [ProductoController::class, 'store']);
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{id_producto}', [ProductoController::class, 'show']);

Route::get('/clientes', [ClienteController::class, 'index']);
