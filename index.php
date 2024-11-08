<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina Magna</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="scss/estiloBootstrap.css">
    <style>html, body {
        height: 100%; /* Asegura que el html y body ocupen el 100% de la altura */
        margin: 0; }
    </style>
</head>
<body>
    <header class="bg-secundario">
        <nav class="navbar navbar-expand-lg bg-secundario">
            <div class="container">
                <!-- Logo visible en todas las pantallas; nombre visible solo en pantallas grandes -->
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="imagenes/logosinnombre.png" alt="Logo" width="50" height="40">
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
                        <!-- Botón de iniciar sesión -->
                        <?php if(!isset($_SESSION['idUsuario'])){ ?>
                            <li class="nav-item ms-3">
                                <a href="paginas/IniciarSesionVisual.php" class="btn btn-primary">Iniciar Sesión</a>
                            </li>
                        <?php }else{ ?>
                            <li class="nav-item ms-3">
                                <a href="../backend/cerrarSesion.php" class="btn btn-primary">Cerrar Sesión</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="bg-fondoClaro py-4">
        <div class="container text-center">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <!-- Tarjetas de Servicios -->
                <div class="col">
                    <div class="card h-100">
                        <img src="imagenes/medicos.jpeg" class="card-img-top" alt="Médicos">
                        <div class="card-body">
                            <h5 class="card-title">Médicos</h5>
                            <p class="card-text">Personal de trabajo</p>
                            <a href="paginas/verMedicosVisual.php" class="btn btn-primario">Ver</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="imagenes/pacientes.jpeg" class="card-img-top" alt="Pacientes">
                        <div class="card-body">
                            <h5 class="card-title">Pacientes</h5>
                            <p class="card-text">Pacientes registrados</p>
                            <a href="paginas/verPacientesVisual.php" class="btn btn-primario">Ver</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="imagenes/empleado.jpeg" class="card-img-top img-fluid" alt="Empleados">
                        <div class="card-body">
                            <h5 class="card-title">Empleados</h5>
                            <p class="card-text">Personal administrativo</p>
                            <a href="paginas/verEmpleadosVisual.php" class="btn btn-primario">Ver</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="imagenes/obrasocial.jpg" class="card-img-top" alt="Obra Social">
                        <div class="card-body">
                            <h5 class="card-title">Obras Sociales</h5>
                            <p class="card-text">Consulta de obras sociales</p>
                            <a href="paginas/verListaObrasSocialesVisual.php" class="btn btn-primario">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="imagenes/consultorio.jpeg" class="card-img-top" alt="Consultorios">
                        <div class="card-body">
                            <h5 class="card-title">Consultorios</h5>
                            <p class="card-text">Consultoría online</p>
                            <a href="paginas/buscarConsultoriosVisual.php" class="btn btn-primario">Ver</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="imagenes/recetas.jpeg" class="card-img-top" alt="Recetas">
                        <div class="card-body">
                            <h5 class="card-title">Recetas</h5>
                            <p class="card-text">Consulta de recetas</p>
                            <a href="paginas/verRecetasVisual.php" class="btn btn-primario">Ver</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="imagenes/medicamentos.jpeg" class="card-img-top" alt="Medicamentos">
                        <div class="card-body">
                            <h5 class="card-title">Medicamentos</h5>
                            <p class="card-text">Registro de medicamentos</p>
                            <a href="paginas/verListaMedicamentosVisual.php" class="btn btn-primario">Ver</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="imagenes/turno.jpeg" class="card-img-top" alt="Turnos">
                        <div class="card-body">
                            <h5 class="card-title">Turnos Médicos</h5>
                            <p class="card-text">Gestión de turnos</p>
                            <a href="paginas/verTurnosVisual.php" class="btn btn-primario">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="imagenes/enfermedades.jpeg" class="card-img-top" alt="Enfermedades">
                        <div class="card-body">
                            <h5 class="card-title">Enfermedades</h5>
                            <p class="card-text">Listado de enfermedades</p>
                            <a href="paginas/verListaEnfermedadesVisual.php" class="btn btn-primario">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-fondoOscuro text-light py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="imagenes/logo magno systems.png" alt="Logo Magno Systems" width="75" height="50">
                <span class="ms-3">© 2024 MagnoSystems</span>
            </div>
            <ul class="list-unstyled d-flex mb-0">
                <li class="ms-3">
                    <a class="text-light" href="#"><i class="bi bi-twitter"></i></a>
                </li>
                <li class="ms-3">
                    <a class="text-light" href="#"><i class="bi bi-instagram"></i></a>
                </li>
                <li class="ms-3">
                    <a class="text-light" href="#"><i class="bi bi-facebook"></i></a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
