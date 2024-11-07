<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Registrarse | Medicina Magna</title>
</head>
<body class="bg-fondoClaro">
    <header class="bg-fondoClaro" style="margin-left:10px">
        <a class="navbar-brand d-flex align-items-center" href="../index.html">
            <img src="../imagenes/logosinnombre.png" alt="Logo" width="50" height="40">
            <span class="text-fondoOscuro ms-2 fs-5 d-none d-lg-inline">MedicinaMagna</span>
        </a>
    </header>
    <main class="bg-fondoClaro login-container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-box">
            <div class="card p-4 shadow-lg">
                <?php include('../backend/crearContraseñaFormulario.php') ?>
            </div>
        </div>
    </main>
    <footer>
        <?php include('footer.php') ?>
    </footer>
</body>
</html>