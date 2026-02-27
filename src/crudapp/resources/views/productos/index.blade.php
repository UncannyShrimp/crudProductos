<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutaita|Productos</title>
</head>
<body>
    <h2>{{ $titulo }}</h2>

<a href="/productos/crear">Crear Productos</a>
    <ul>
        
            
        
        @foreach ($productos as $producto)
            <li>
                <p>{{ $producto->nombre }}</p>
                <p>{{ $producto->imagen }}</p>
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
                <a href="/productos/{{ $producto->id }}"> Ver Detalles</a>
                <a href="/productos/editar/{{ $producto->id }}"> Editar</a>
            </li>
        @endforeach
        

    </ul>
</body>
</html>