<x-layout>
    <h1>Crear Producto</h1>

    <form action="{{ route('productos.guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
            @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" name="precio" id="precio" value="{{ old('precio') }}" required min="0">
            @error('precio') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock') }}" required min="0">
            @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del producto</label>
            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required>
            @error('imagen') <span class="text-danger">{{ $message }}</span> @enderror

            <!-- Área de previsualización -->
            <div class="mt-3">
                <img id="preview" src="#" alt="Previsualización de la imagen" style="max-width: 300px; max-height: 300px; display: none; object-fit: contain; border: 1px solid #ddd; border-radius: 6px;">
            </div>
        </div>

        <input type="hidden" name="estado" value="1">

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
            <button type="reset" class="btn btn-secondary" onclick="document.getElementById('preview').style.display='none'">Limpiar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">Volver</a>
        </div>
    </form>

    <!-- JavaScript para previsualizar la imagen -->
    <script>
        document.getElementById('imagen').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const preview = document.getElementById('preview');
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-layout>