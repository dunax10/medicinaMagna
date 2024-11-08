<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
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
                    

                        <!-- Botón de iniciar sesión, visible en ambas versiones -->
                        <li class="nav-item ms-3">
                            <a href="paginas/IniciarSesionVisual.php" class="btn btn-primario">Cerrar sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>