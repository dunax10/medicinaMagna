<?php
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
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
                <form action="../../backend/crearEnfermedad.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" required><br>
                    <input type="submit" class="btn btn-terciario" name="enviar" value="Enviar">
                </form>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser medico";
            header("location: ../iniciarSesionVisual.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: ../iniciarSesionVisual.php");
    }
?>