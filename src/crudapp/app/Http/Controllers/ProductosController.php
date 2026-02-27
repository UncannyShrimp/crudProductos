<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use DB;

class ProductosController extends Controller
{
    public function index()
    {
        $listaProductos = Productos::orderBy('id', 'desc')->get();
        return view('productos.index', ["productos" => $listaProductos]);
    }
    public function mostrar($id)
    {
        $producto = Productos::findOrFail($id);
        return view('productos.verproducto',  ["producto" => $producto], ["id" => $id]);
    
    }
    public function crear()
    {
        return view('productos.crearproducto');
    }
    public function editar($id)
    {
        //
    }

    public function guardar(Request $request, $id)
    {
        //
    }

    public function destruir($id)
    {
        //
    }

    public function desactivar($id)
    {
        //
    }

}
