<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('welcome');
});

//RUTA DE LOS PRODUCTOS
Route::get('/productos', [ProductosController::class, 'index']); 

//RUTA DE CREAR PRODUCTO
Route::get('/productos/crear', [ProductosController::class, 'crear']);

//RUTA DE EDITAR PRODUCTO
Route::get('/productos/editar/{id}', function ($id) {
    $producto = DB::table('productos')->where('id', $id)->first();
    return view('productos.editarproducto', ["producto" => $producto], ["id" => $id]);
});

//RUTA DE VER PRODUCTO
Route::get('/productos/{id}', [ProductosController::class, 'mostrar']);