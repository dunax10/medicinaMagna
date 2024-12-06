<?php
    include('mensaje.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idEmpleado = $_POST['idEmpleado'];
            $nombre = $_POST['nombre'];
            $mail = $_POST['mail'];
            ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <form action="../../backend/modificarEmpleado.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" class="form-control p-1 my-1" name="nombre" placeholder="<?= $nombre ?>" value="<?= $nombre ?>" required><br>
                    <input type="hidden" name="idEmpleado" value="<?= $idEmpleado ?>">
                    <label>Email:</label>
                    <input type="email" class="form-control p-1 my-1" name="mail" placeholder="<?= $mail ?>" value="<?= $mail ?>" required><br>
                    <input type="submit" name="enviar" class="btn btn-terciario"value="Enviar">
                </form>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador para modificar empleados";
            header("location: ../paginas/iniciarSesionVisual.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: ../paginas/iniciarSesionVisual.php");
    }
?>