<?php
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            $idMedicamento = $_POST['idMedicamento'];
            $nombre = $_POST['nombre'];
            ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
            <div class="container my-1">
                <form action="../../backend/modificarMedicamento.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="<?= $nombre ?>" value="<?= $nombre ?>" required><br>
                    <input type="hidden" name="idMedicamento" value="<?= $idMedicamento ?>">
                    <div class="d-flex justify-content-center m-1">
                        <input type="submit" class="btn btn-terciario" name="enviar" value="Enviar">
                    </div>
                </form>
            </div>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser medico";
            header("location: ../paginas/iniciarSesionVisual.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: ../paginas/iniciarSesionVisual.php");
    }
?>