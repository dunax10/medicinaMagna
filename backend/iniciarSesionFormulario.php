<?php
    include('mensaje.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/estiloIniciarSesion.css">
    
</head>
<body>
    <div class="contenedorSesion">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>
        <form action="iniciarSesion.php" method="post">
            <!-- Email input -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" required>
            </div>
            <!-- Password input -->
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" required>
            </div>
            <!-- Submit button -->
            <div class="d-grid">
                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
            </div>
            <!-- Link to reset password -->
            <div class="text-center mt-3">
                <a href="crearContraseñaFormulario.php" class="btn-link">¿Primera vez? Establecer contraseña</a>
            </div>
        </form>
        <div class="text-center text-muted mt-4">
            © 2024 Medicina Magna
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
