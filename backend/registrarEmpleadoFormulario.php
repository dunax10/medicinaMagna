<?php
    session_start();
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
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
                <form action="registrarEmpleado.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Ingrese el nombre" required><br>
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Ingrese el email" required><br>
                    <label>Contraseña:</label>
                    <input type="hidden" name="contraseña" value="noCreada"><br>
                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>

            <?php
        }
        else
        {
            header("location: ../iniciarSesion/iniciarSesionFormulario.php");
        }
    }
    else
    {
        header("location: ../iniciarSesion/iniciarSesionFormulario.php");
    }
?>