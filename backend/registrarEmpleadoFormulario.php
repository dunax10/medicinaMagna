<?php
    include('mensaje.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <form action="registrarEmpleado.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Ingrese el nombre" required><br>
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Ingrese el email" required><br>
                    <label>Contraseña:</label>
                    <input type="hidden" name="contraseña" value="noCreada"><br>
                    <input type="submit" name="enviar" value="Enviar">
                </form>
                <a href="registrarMedicoFormulario.php">Quiere ingresar un médico?</a>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador para registrar empleados";
            header("location: iniciarSesionFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: iniciarSesionFormulario.php");
    }
?>