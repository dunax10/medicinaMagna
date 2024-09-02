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
                <form action="agregarObrasSociales.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Ingrese el nombre" required><br>
                    <label>Telefono:</label>
                    <input type="text" name="telefono" placeholder="Ingrese el telefono" required><br>
                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador";
            header("location: iniciarSesionFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: iniciarSesionFormulario.php");
    }
?>