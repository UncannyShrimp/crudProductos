<x-layout>
    <h1>Editar Producto</h1>
    <form action="/productos" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}">
        </div>
        <div>
            <label for="descripcion">Descripcion</label>
            <input class="form-control" type="text" name="descripcion" id="descripcion"
                value="{{ $producto->descripcion }}">
        </div>
        <div>
            <label for="precio">Precio</label>
            <input class="form-control" type="text" name="precio" id="precio" value="{{ $producto->precio }}">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input class="form-control" type="text" name="stock" id="stock" value="{{ $producto->stock }}">
        </div>
        <div>
            <label for="estado">Estado</label>
            <input class="form-control" type="checkbox" name="estado" id="estado" @if ($producto->estado == true) checked
            @else @endif>
        </div>
        <div>
            <label for="imagen">Imagen</label>
            <input class="form-control" type="file" name="imagen" id="imagen">
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-primary" type="reset">Limpiar</button>
        <a href="/productos" class="btn btn-primary">Volver</a>
    </form>
</x-layout>