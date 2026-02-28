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
        $producto = Productos::where('id', $id)->first();
        return view('productos.verproducto',  ["producto" => $producto], ["id" => $id]);
    
    }
    public function crear()
    {
        return view('productos.crearproducto');
    }
    public function editar($id)
    {
        $producto = Productos::where('id', $id)->first();
        return view('productos.editarproducto', ["producto" => $producto]);
    
    }
    public function guardar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|decimal:2,2',
            'stock' => 'required|numeric|min:0',
            'estado' => 'required|boolean',
            'imagen' => 'required',
        ]);

        Productos::create($validated);

        return redirect()->route('productos.index');
    }

    public function actualizar(Request $request, $id)
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
