<?php
    session_start();
    if(isset($_SESSION['mensajeError'])) 
    {
        echo "<script>alert('" . $_SESSION['mensajeError'] . "');</script>";
        unset($_SESSION['mensajeError']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="crearContraseña.php" method="post">
        <label>Email:</label>
        <input type="email" name="email" placeholder="Ingrese el email" required><br>
        <label>Contraseña:</label>
        <input type="password" name="contraseña" placeholder="Ingrese la contraseña" required><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <a href="iniciarSesionFormulario.php">iniciar Sesion</a>
</body>
</html>