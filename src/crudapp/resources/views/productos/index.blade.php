<x-layout>
    <h2>Productos disponibles</h2>
    <ul>
        @foreach ($productos as $producto)
            <li>
                <p>{{ $producto->nombre }}</p>
                <p>{{ $producto->imagen }}</p>
                <p>{{ $producto->descripcion }}</p>
                <p>{{ $producto->precio }}</p>
                <p>{{ $producto->stock }}</p>
                <p>
                    @if ($producto->estado == true)
                        Activo
                    @else
                        Inactivo
                    @endif
                </p>
                <a href="/productos/{{ $producto->id }}"> Ver Detalles</a>
                <a href="/productos/editar/{{ $producto->id }}"> Editar</a>
            </li>
        @endforeach
    </ul>
</x-layout>