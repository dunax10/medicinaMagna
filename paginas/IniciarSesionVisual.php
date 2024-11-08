<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Iniciar Sesión | Medicina Magna</title>
</head>
<body class="d-flex flex-column min-vh-100 bg-fondoClaro">
    <!-- Header -->
    <header class="bg-fondoClaro py-3 w-100">
        <div class="container-fluid d-flexs">
            <a class="navbar-brand d-flex" href="../index.php">
                <img src="../imagenes/logosinnombre.png" alt="Logo" width="50" height="40">
                <span class="text-fondoOscuro ms-2 fs-5 d-none d-lg-inline">Medicina Magna</span>
            </a>
        </div>
    </header>

    <main class="flex-grow-1 d-flex justify-content-center align-items-center p-5">
        <div class="form-box">
            <div class="card p-5 mb-5 shadow-lg">
                <?php include('../backend/iniciarSesionFormulario.php') ?>
            </div>
        </div>
    </main>

    <footer class="bg-fondoOscuro">
        <div class="container-fluid text-center">
            <?php include('footer.php') ?>
        </div>
    </footer>

</body>
</html>
