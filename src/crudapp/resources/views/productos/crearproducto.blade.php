<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Crear Producto</h1>
    <form action="/productos" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre">
        </div>
        <div>
            <label for="descripcion">Descripcion</label>
            <input class="form-control" type="text" name="descripcion" id="descripcion">
        </div>
        <div>
            <label for="precio">Precio</label>
            <input class="form-control" type="text" name="precio" id="precio">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input class="form-control" type="text" name="stock" id="stock">
        </div>
        <div>
            <label for="estado">Estado</label>
            <input class="form-control" type="text" name="estado" id="estado">
        </div>
        <div>
            <label for="imagen">Imagen</label>
            <input class="form-control" type="file" name="imagen" id="imagen">
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-primary" type="reset">Limpiar</button>
        <a href="/productos" class="btn btn-primary">Volver</a>
    </form>

</body>

</html>