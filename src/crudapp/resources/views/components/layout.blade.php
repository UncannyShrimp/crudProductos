<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUTAITA</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-white">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3" role="alert" style="z-index: 1050; min-width: 300px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <header>
        <nav class="navbar navbar-expand-lg bg-black border-bottom border-info border-3 fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold fs-3 text-warning text-shadow" 
                   href="{{ route('productos.index') ?? '/' }}">
                    TUTAITA
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarTutaita" aria-controls="navbarTutaita" 
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTutaita">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-info fw-semibold {{ request()->routeIs('productos.index') ? 'active text-warning' : '' }}" 
                               href="{{ route('productos.index') }}">
                                Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info fw-semibold {{ request()->routeIs('productos.crear') ? 'active text-warning' : '' }}" 
                               href="{{ route('productos.crear') }}">
                                Crear Producto
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Espacio para navbar fixed-top -->
    <div class="pt-5 pb-4"></div>

    <main class="container mt-4 text-white">
        {{ $slot }}
    </main>

</body>
</html>