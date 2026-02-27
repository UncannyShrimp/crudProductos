<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUTAITA</title>
</head>
<body>
    //DETALLES DEL PRODUCTO
    <h1>DETALLES DEL PRODUCTO</h1>
    <h2>{{ $id }}</h2>
    <h2>{{ $producto->nombre }}</h2>
    <h2>{{ $producto->imagen }}</h2>
    <h2>{{ $producto->descripcion }}</h2>
    <h2>{{ $producto->precio }}</h2>
    <h2>{{ $producto->stock }}</h2>
    <h2>
        @if ($producto->estado == true )
            Activo   
        @else
            Inactivo
        @endif
    </h2>
    <a href="/productos">Volver</a>


    
</body>
</html>