<x-layout>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                <div class="card bg-dark text-white border border-info border-3 shadow-lg">
                    <div class="row g-0">

                        <!-- Columna de la imagen -->
                        <div class="col-md-4">
                            @if ($producto->imagen)
                            <div class="image-container">
                                <img src="{{ asset($producto->imagen) }}" 
                                     class="img-fluid rounded-start" 
                                     alt="{{ $producto->nombre }}" 
                                     style="height: 280px; width: auto; object-fit: contain; background: #1a1a1a;">
                            </div>
                            @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary text-muted" 
                                 style="height: 280px; width: 100%;">
                                Sin imagen
                            </div>
                            @endif
                        </div>

                        <!-- Columna de información -->
                        <div class="col-md-7">
                            <div class="card-body p-4 d-flex flex-column h-100">

                                <h1 class="card-title text-warning fw-bold mb-4">
                                    {{ $producto->nombre }}
                                </h1>

                                <div class="mb-4">
                                    <h5 class="text-info fw-semibold">Descripción:</h5>
                                    <p class="text-secondary fs-5">
                                        {{ $producto->descripcion ?? 'Sin descripción disponible.' }}
                                    </p>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-6">
                                        <h5 class="text-info fw-semibold">Precio:</h5>
                                        <p class="fs-3 fw-bold text-info mb-0">
                                            ${{ number_format($producto->precio, 2) }}
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="text-info fw-semibold">Stock:</h5>
                                        <p class="fs-4 fw-bold text-white">
                                            {{ $producto->stock }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h5 class="text-info fw-semibold">Estado:</h5>
                                    @if ($producto->estado)
                                    <span class="badge bg-success fs-5 px-4 py-2">Activo</span>
                                    @else
                                    <span class="badge bg-danger fs-5 px-4 py-2">Inactivo</span>
                                    @endif
                                </div>

                                <!-- Acciones -->
                                <div class="mt-auto d-flex gap-3 flex-wrap">
                                    <a href="{{ route('productos.index') }}" class="btn btn-outline-info btn-lg">
                                        ← Volver a la lista
                                    </a>

                                    <a href="{{ route('productos.editar', $producto->id) }}" class="btn btn-outline-warning btn-lg">
                                        Editar producto
                                    </a>

                                    <form action="{{ route('productos.destruir', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-lg" 
                                                onclick="return confirm('¿Realmente deseas eliminar este producto? Esta acción no se puede deshacer.')">
                                            Borrar producto
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>