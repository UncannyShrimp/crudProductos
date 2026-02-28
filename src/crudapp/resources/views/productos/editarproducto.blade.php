<x-layout>

    <h1>Editar Producto: {{ $producto->nombre }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡Hay errores en el formulario!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('productos.actualizar', $producto->id) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" 
                   class="form-control @error('nombre') is-invalid @enderror" 
                   name="nombre" id="nombre" 
                   value="{{ old('nombre', $producto->nombre) }}" 
                   required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                      name="descripcion" rows="3" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" min="0"
                   class="form-control @error('precio') is-invalid @enderror" 
                   name="precio" id="precio" 
                   value="{{ old('precio', $producto->precio) }}" required>
            @error('precio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" min="0"
                   class="form-control @error('stock') is-invalid @enderror" 
                   name="stock" id="stock" 
                   value="{{ old('stock', $producto->stock) }}" required>
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" required>
                <option value="1" {{ old('estado', $producto->estado) ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !old('estado', $producto->estado) ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('estado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen actual</label>
            <div>
                @if ($producto->imagen && file_exists(public_path($producto->imagen)))
                    <img src="{{ asset($producto->imagen) }}" 
                         alt="{{ $producto->nombre }}" 
                         style="max-width:300px; max-height:300px; object-fit:contain; border:1px solid #ddd; border-radius:6px;">
                @else
                    <p class="text-muted">No hay imagen disponible</p>
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Nueva imagen (opcional - deja en blanco para mantener la actual)</label>
            <input type="file" accept="image/*"
                   class="form-control @error('imagen') is-invalid @enderror" 
                   name="imagen" id="imagen">
            @error('imagen')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!-- Previsualización de la nueva imagen -->
            <div class="mt-3">
                <img id="preview" src="#" alt="Previsualización de nueva imagen" 
                     style="max-width:300px; max-height:300px; display:none; object-fit:contain; border:1px solid #ddd; border-radius:6px;">
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>

    <script>
        document.getElementById('imagen').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>

</x-layout>