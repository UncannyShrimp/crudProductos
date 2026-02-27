<x-layout>
    <h2>Productos disponibles</h2>
    <ul>
        @foreach ($productos as $producto)
            <li>
                <x-card href="productos/{{ $producto->id }}">
                    <h3>{{ $producto->nombre }}</h3>
                    <img src="{{ $producto->imagen }}" alt="image">
                    <img src="{{ Storage::url('images/cepillo.jpg') }}" alt="Photo" class="img-fluid">
                    <p>{{ $producto->descripcion }}</p>
                    <p>{{ $producto->precio }}</p>
                    <p>{{ $producto->stock }}</p>
                    <p>
                        @if ($producto->estado == true )
                            Activo   
                        @else
                            Inactivo
                        @endif
                    </p>

                </x-card>
            </li>
        @endforeach
    </ul>
</x-layout>