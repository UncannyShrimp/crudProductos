<x-layout>
    <h1>Crear Producto</h1>
    <form action="{{ route('productos.guardar') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre</label>
            <input 
                class="form-control" 
                type="text" 
                name="nombre" 
                id="nombre">
        </div>
        <div>
            <label for="descripcion">Descripcion</label>
            <input 
                class="form-control" 
                type="text" 
                name="descripcion" 
                id="descripcion">
        </div>
        <div>
            <label for="precio">Precio (0-1000)</label>
            <input 
                class="form-control" 
                type="float" 
                name="precio" 
                id="precio">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input 
                class="form-control" 
                type="number" 
                name="stock" 
                id="stock">
        </div>
        <div>
            <label for="imagen">Imagen</label>
            <input class="form-control" type="file" name="imagen" id="imagen">
        </div>
        <button class="btn btn-primary" type="guardar">Guardar</button>
        <button class="btn btn-primary" type="reset">Limpiar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        
        @endif
    
    </form>
</x-layout>


