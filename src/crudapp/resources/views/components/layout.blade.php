<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUTAITA</title>
</head>
<body>
    <header>
        <nav>
            <h1>TUTAITA</h1>
            <a href="/productos">Productos</a>
            <a href="/productos/crear">Crear Productos</a>
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>