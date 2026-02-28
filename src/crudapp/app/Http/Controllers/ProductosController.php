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
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'estado'      => 'required|boolean',
            'imagen'      => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048', // ← importante
        ]);

        // Procesar y guardar la imagen
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $file = $request->file('imagen');
            $originalExtension = $file->getClientOriginalExtension();

            // Nombre único: slug del nombre + fecha + microsegundos
            $nombreBase = $validated['nombre']."-";
            $fechaUnica = now()->format('Ymd-His');
            $nombreImagen = "{$nombreBase}-{$fechaUnica}.{$originalExtension}";

            // Guardar en storage/app/public/productos/
            $ruta = $file->storeAs('productos', $nombreImagen, 'public');

            // La ruta que guardarás en la base de datos
            $validated['imagen'] = 'storage/' . $ruta;
        }

        Productos::create($validated);

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
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
