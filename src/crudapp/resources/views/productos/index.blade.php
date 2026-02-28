<x-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-5 text-white fw-bold">Productos Disponibles</h2>

        @if ($productos->isEmpty())
            <div class="alert alert-info text-center">
                No hay productos disponibles en este momento.
            </div>
        @else
            <div class="row justify-content-center">
                @foreach ($productos as $producto)
                    <div class="col-12 col-lg-10 mb-4"> <!-- 100% ancho en móvil, un poco más estrecho en desktop -->

                        <div class="card bg-dark text-white border border-info border-2 shadow-sm h-100">
                            <div class="row g-0">

                                <!-- Imagen a la izquierda (o arriba en móvil) -->
                                <div class="col-md-4">
                                    @if ($producto->imagen)
                                        <div class="image-container">
                                            <img src="{{ $producto->imagen }}" 
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

                                <!-- Contenido a la derecha -->
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column h-100">
                                        <h5 class="card-title text-warning fw-bold mb-3">
                                            {{ $producto->nombre }}
                                        </h5>

                                        <p class="card-text text-secondary mb-4 flex-grow-1">
                                            {{ Str::limit($producto->descripcion, 180) }}
                                        </p>

                                        <div class="mt-auto">
                                            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
                                                <div>
                                                    <p class="fs-4 fw-bold text-info mb-1">
                                                        ${{ number_format($producto->precio, 2) }}
                                                    </p>
                                                    <p class="text-muted small">
                                                        Stock: {{ $producto->stock }}
                                                    </p>
                                                </div>

                                                <div>
                                                    @if ($producto->estado)
                                                        <span class="badge bg-success px-3 py-2">Activo</span>
                                                    @else
                                                        <span class="badge bg-danger px-3 py-2">Inactivo</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="d-flex gap-2 flex-wrap">
                                                <a href="{{ route('productos.mostrar', $producto->id) }}" 
                                                   class="btn btn-outline-info">
                                                    Detalles
                                                </a>
                                                
                                                <a href="{{ route('productos.editar', $producto->id) }}" 
                                                   class="btn btn-outline-warning">
                                                    Editar
                                                </a>

                                                <form action="{{ route('productos.destruir', $producto->id) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-outline-danger"
                                                            onclick="return confirm('¿Seguro que quieres eliminar este producto?')">
                                                        Borrar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif
    </div>
</x-layout>