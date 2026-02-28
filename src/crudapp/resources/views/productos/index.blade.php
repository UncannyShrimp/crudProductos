<x-layout>
    <h2>Productos disponibles</h2>
    <ul>
        @foreach ($productos as $producto)
        <li>
            <h3>{{ $producto->nombre }}</h3>
            <img src="{{ $producto->imagen }}" alt="image" width="200" height="200">
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
            <a href="{{ route('productos.mostrar', $producto->id) }}"> Detalles</a>
            <a href="{{ route('productos.editar', $producto->id) }}"> Editar</a>

            <form action="{{ route('productos.destruir', $producto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Borrar</button>

            </form>
        </li>
        @endforeach
    </ul>
</x-layout>
