<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>heaader</title>
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
</head>
<body margin="0">
    <header class="bg-secundario">
        <nav class="navbar navbar-expand-lg bg-secundario">
            <div class="container">
                <!-- Logo visible en todas las pantallas; nombre visible solo en pantallas grandes -->
                <a class="navbar-brand d-flex align-items-center" href="index.html">
                    <img src="../imagenes/logosinnombre.png" alt="Logo" width="50" height="40">
                    <span class="text-fondoOscuro ms-2 fs-5 d-none d-lg-inline">MedicinaMagna</span>
                </a>

                <!-- Botón para colapsar el menú en pantallas pequeñas -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenido del Navbar -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <!-- Barra de búsqueda que se mostrará solo en el menú desplegable en pantallas pequeñas -->
                        <li class="nav-item w-100 d-lg-none mb-2">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
                                <button class="btn btn-terciario" type="submit">Buscar</button>
                            </form>
                        </li>

                        <!-- Barra de búsqueda visible en pantallas grandes -->
                        <li class="nav-item d-none d-lg-block">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
                                <button class="btn btn-terciario" type="submit">Buscar</button>
                            </form>
                        </li>

                        <!-- Botón de iniciar sesión, visible en ambas versiones -->
                        <li class="nav-item ms-3">
                            <a href="paginas/IniciarSesionVisual.php" class="btn btn-primary">Iniciar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>