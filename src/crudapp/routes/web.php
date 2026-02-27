<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

//RUTA DE LOS PRODUCTOS
Route::get('/productos', function () {
    $productos = DB::table('productos')->get();
    return view('productos.index', ["titulo"=>"Nuestros Productos"], ["productos" => $productos]);
});

//RUTA DE CREAR PRODUCTO
Route::get('/productos/crear', function () {
    return view('productos.crearproducto', ["titulo"=>"Crear Producto"]);
});

//RUTA DE VER PRODUCTO
Route::get('/productos/{id}', function ($id) {
    $producto = DB::table('productos')->where('id', $id)->first();
    return view('productos.verproducto',  ["producto" => $producto], ["id" => $id]);

});

//RUTA DE EDITAR PRODUCTO
Route::get('/productos/editar/{id}', function ($id) {
    $producto = DB::table('productos')->where('id', $id)->first();
    return view('productos.editarproducto', ["producto" => $producto], ["id" => $id]);
});



