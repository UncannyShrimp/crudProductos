<x-layout>

    <h1>Editar Producto: {{ $producto->nombre }}</h1>

    <form action="{{ route('productos.actualizar', $producto->id) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          novalidate>
        @csrf
        @method('PUT')

        <!-- Campos de texto -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                   name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                      name="descripcion" rows="3" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" min="0" class="form-control @error('precio') is-invalid @enderror" 
                   name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" required>
            @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" min="0" class="form-control @error('stock') is-invalid @enderror" 
                   name="stock" id="stock" value="{{ old('stock', $producto->stock) }}" required>
            @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select @error('estado') is-invalid @enderror" name="estado" id="estado" required>
                <option value="1" {{ old('estado', $producto->estado) ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado', $producto->estado) ? '' : 'selected' }}>Inactivo</option>
            </select>
            @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Sección de imagen -->
        <div class="mb-3">
            <label class="form-label">Imagen</label>

            <div id="image-container">
                <!-- Imagen actual (visible por defecto) -->
                <div id="current-image" class="current-image-visible">
                    @if ($producto->imagen && file_exists(public_path($producto->imagen)))
                        <img src="{{ asset($producto->imagen) }}" 
                             alt="Imagen actual de {{ $producto->nombre }}" 
                             class="img-preview"
                             style="max-width:320px; max-height:320px; object-fit:contain; border:1px solid #ccc; border-radius:6px;">
                    @else
                        <p class="text-muted">No hay imagen cargada actualmente</p>
                    @endif
                </div>

                <!-- Previsualización nueva (oculta por defecto) -->
                <div id="preview-wrapper" style="display: none;">
                    <img id="preview" src="#" alt="Previsualización de nueva imagen" 
                         class="img-preview"
                         style="max-width:320px; max-height:320px; object-fit:contain; border:1px solid #ccc; border-radius:6px;">
                </div>
            </div>

            <div class="mt-3">
                <label for="imagen" class="form-label">Seleccionar nueva imagen (opcional)</label>
                <input type="file" accept="image/*" 
                       class="form-control @error('imagen') is-invalid @enderror" 
                       name="imagen" id="imagen">
                @error('imagen') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <small class="form-text text-muted mt-1">
                <!--Al seleccionar una imagen nueva, reemplazará la vista actual en esta pantalla (pero solo se guardará al hacer clic en Actualizar). -->
            </small>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary ms-2">Cancelar</a>
        </div>
    </form>

    <script>
        const inputFile     = document.getElementById('imagen');
        const currentImage  = document.getElementById('current-image');
        const previewWrapper = document.getElementById('preview-wrapper');
        const previewImg    = document.getElementById('preview');

        inputFile.addEventListener('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                // Mostrar previsualización y ocultar imagen actual
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImg.src = event.target.result;
                    currentImage.style.display = 'none';
                    previewWrapper.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                // Volver a mostrar imagen actual y ocultar previsualización
                currentImage.style.display = 'block';
                previewWrapper.style.display = 'none';
                previewImg.src = '#';
            }
        });
    </script>

    <style>
        .img-preview {
            display: block;
            margin: 0.5rem 0;
        }
        #image-container {
            min-height: 200px;
        }
    </style>

</x-layout>