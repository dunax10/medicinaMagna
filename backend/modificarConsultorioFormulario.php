<?php
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            $idConsultorio = $_POST['idConsultorio'];
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
                <form action="modificarConsultorio.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="<?= $nombre ?>" value="<?= $nombre ?>" required><br>
                    <input type="hidden" name="idConsultorio" value="<?= $idConsultorio ?>">
                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser medico";
            header("location: iniciarSesionFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: iniciarSesionFormulario.php");
    }
?>