<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUTAITA</title>
</head>
<body>
    @if(session('success'))
        <div id="flash" class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
    <header>
        <nav>

            <h1>TUTAITA</h1>
            <a href="{{ route('productos.index') }}">Productos</a>
            <a href="{{ route('productos.crear') }}">Crear Productos</a>
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>
