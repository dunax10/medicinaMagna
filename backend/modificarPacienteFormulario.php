<?php
    session_start();
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            $idPaciente = $_POST['idPaciente'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $sexo = $_POST['sexo'];
            $fechaNacimiento = $_POST['fechaNacimiento'];
            $tipoSangre = $_POST['tipoSangre'];
            $telefono = $_POST['telefono'];
            $domicilio = $_POST['domicilio'];
            $mail = $_POST['mail'];
            $dni = $_POST['dni'];

            ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <form action="../backend/modificarPaciente.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="<?= $nombre ?>" value="<?= $nombre ?>" required><br>
                    <input type="hidden" name="idPaciente" value="<?= $idPaciente ?>">

                    <label>Apellido:</label>
                    <input type="text" name="apellido" placeholder="<?= $apellido ?>" value="<?= $apellido ?>" required><br>
                    <label>Sexo:</label>
                    <select name="sexo" required>
                        <option value="<?= $sexo ?>" selected><?= $sexo ?></option>
                        <option value="F">Mujer</option>
                        <option value="M">Hombre</option>
                    </select><br>
                    <label>Tipo de sangre:</label>
                    <select name="tipoSangre" required>
                        <option value="<?= $tipoSangre ?>" selected><?= $tipoSangre ?></option>
                        <option value="A+">A+</option>
                        <option value="B+">B+</option>
                        <option value="O+">O+</option>
                        <option value="AB+">AB+</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="O-">O-</option>
                        <option value="AB-">AB-</option>
                    </select><br>
                    <label>DNI:</label>
                    <input type="text" name="dni" placeholder="<?= $dni ?>" value="<?= $dni ?>" required><br>
                    <label>Telefono:</label>
                    <input type="text" name="telefono" placeholder="<?= $telefono ?>" value="<?= $telefono ?>"><br>
                    <label>Domicilio:</label>
                    <input type="text" name="domicilio" placeholder="<?= $domicilio ?>" value="<?= $domicilio ?>"><br>
                    <label>Fecha de Nacimiento:</label>
                    <input type="date" name="fechaNacimiento" value="<?= $fechaNacimiento ?>" required><br>
                    <label>Email:</label>
                    <input type="email" name="mail" placeholder="<?= $mail ?>" value="<?= $mail ?>" required><br>
                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser medico para registrar pacientes";
            header("location: ../paginas/iniciarSesionVisual.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: ../paginas/iniciarSesionVisual.php");
    }
?>