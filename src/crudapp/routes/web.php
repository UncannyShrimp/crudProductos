<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('welcome');
});

//RUTA DE LOS PRODUCTOS
Route::get('/productos', [ProductosController::class, 'index']) -> name('productos.index'); 
//RUTA DE CREAR PRODUCTO
Route::get('/productos/crear', [ProductosController::class, 'crear'])  -> name('productos.crear');
//RUTA DE VER PRODUCTO
Route::get('/productos/{id}', [ProductosController::class, 'mostrar']) -> name('productos.mostrar');
//RUTA DE CREAR PRODUCTO
Route::post('/productos', [ProductosController::class, 'guardar']) -> name('productos.guardar');
//RUTA DE EDITAR PRODUCTO
Route::get('/productos/editar/{id}', [ProductosController::class, 'editar']) -> name('productos.editar');
//RUTA DE ACTUALIZAR PRODUCTO
Route::put('/productos/{id}', [ProductosController::class, 'actualizar']) -> name('productos.actualizar');
//RUTA DE DESTRUIR PRODUCTO
Route::delete('/productos/{id}', [ProductosController::class, 'destruir']) -> name('productos.destruir');
//RUTA DE DESACTIVAR PRODUCTO
Route::get('/productos/desactivar/{id}', [ProductosController::class, 'desactivar']) -> name('productos.desactivar');
