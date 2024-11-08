<?php
    include('mensaje.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idObraSocial = $_POST['idObraSocial'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <form action="../backend/modificarObraSocial.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="<?= $nombre ?>" value="<?= $nombre ?>" required><br>
                    <label>Telefono:</label>
                    <input type="text" name="telefono" placeholder="<?= $telefono ?>" value="<?= $telefono ?>" required><br>
                    <input type="hidden" name="idObraSocial" value="<?=$idObraSocial ?>">
                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser admin";
            header("location: ../paginas/iniciarSesionVisual.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: ../paginas/iniciarSesionVisual.php");
    }
?>