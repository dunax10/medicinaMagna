<?php
//idPaciente	fecha	cantidadMedicamento	periodoMedicamentos	
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idMedico = $_POST['idMedico'];
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $telefono = $_POST['telefono'];
            $domicilio = $_POST['domicilio'];
            $fechaIngreso = $_POST['fechaIngreso'];
            $sexo = $_POST['sexo'];
            $fechaNacimiento = $_POST['fechaNacimiento'];
            include('conexion.php');
            ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
    <div class="container my-2">
        <form action="../../backend/modificarMedico.php" method="post">
            <div class="row">
                <!-- Primera columna -->
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" class="my-1 form-control" name="nombre" placeholder="<?= $nombre ?>" value="<?= $nombre ?>" required><br>

                    <label>DNI:</label>
                    <input type="number" class="my-1 form-control" name="dni" placeholder="<?= $dni ?>" value="<?= $dni ?>" required><br>

                    <label>Teléfono:</label>
                    <input type="text" class="my-1 form-control" name="telefono" placeholder="<?= $telefono ?>" value="<?= $telefono ?>" required><br>

                    <label>Domicilio:</label>
                    <input type="text" class="my-1 form-control" name="domicilio" placeholder="<?= $domicilio ?>" value="<?= $domicilio ?>" required><br>
                </div>

                <!-- Segunda columna -->
                <div class="col-md-6">
                    <label>Fecha de ingreso:</label>
                    <input type="text" class="my-1 form-control" name="fechaIngreso" placeholder="<?= $fechaIngreso ?>" value="<?= $fechaIngreso ?>" required><br>

                    <label>Fecha de nacimiento:</label>
                    <input type="text" class="my-1 form-control" name="fechaNacimiento" placeholder="<?= $fechaNacimiento ?>" value="<?= $fechaNacimiento ?>" required><br>

                    <label>Sexo:</label>
                    <select class="my-1 form-control" name="sexo" required>
                        <option value="<?= $sexo ?>" selected><?= $sexo ?></option>
                        <option value="F">Mujer</option>
                        <option value="M">Hombre</option>
                    </select><br>

                    <input type="hidden" name="idMedico" value="<?= $idMedico ?>">
                </div>
            </div>

            <!-- Botón centrado -->
            <div class="d-flex justify-content-center mt-4">
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
            $_SESSION['mensaje'] = "Debe ser admin para modificar los medicos";
            header("location: ../paginas/iniciarSesionVisual.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: ../paginas/iniciarSesionVisual.php");
    }
?>