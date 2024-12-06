<?php
    include('conexion.php');
    include('mensaje.php');
    
    if(isset($_SESSION['medico'])) {
        if($_SESSION['medico'] == true) {
            $idUsuario = $_SESSION['idUsuario'];

            // Consulta para obtener los médicos vigentes
            $sql = "SELECT * FROM medicos WHERE vigente = 1 ORDER BY nombre ASC;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($idMedico, $nombre, $apellido, $dni, $sexo, $fechaNacimiento, $fechaIngreso, $telefono, $domicilio, $disponibilidad, $idEmpleado, $vigente);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Médicos</title>
    </style>
</head>
<body>
    <div class="container my-3">
        <h2 class="text-center mb-3">Listado de Médicos</h2>
        <div class="row">
            <?php
                while ($stmt->fetch()) {
            ?>
                <div class="col-md-6 mb-4">
                    <div class="border p-3 shadow">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p><strong>ID:</strong> <?= $idMedico ?></p>
                                <p><strong>Nombre:</strong> <?= $nombre ?> <?= $apellido ?></p>
                                <p><strong>DNI:</strong> <?= $dni ?></p>
                                <p><strong>Teléfono:</strong> <?= $telefono ?></p>
                                <p><strong>Domicilio:</strong> <?= $domicilio ?></p>
                                <p><strong>Fecha de Ingreso:</strong> <?= $fechaIngreso ?></p>
                                <p><strong>Sexo:</strong> <?= $sexo ?></p>
                                <p><strong>Fecha de Nacimiento:</strong> <?= $fechaNacimiento ?></p>
                            </div>
                            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) { ?>
                                <div class="d-flex flex-column gap-2">
                                    <form action="modificarMedicosVisual.php" method="post">
                                        <input type="hidden" name="idMedico" value="<?= $idMedico ?>">
                                        <input type="hidden" name="nombre" value="<?= $nombre ?>">
                                        <input type="hidden" name="apellido" value="<?= $apellido ?>">
                                        <input type="hidden" name="dni" value="<?= $dni ?>">
                                        <input type="hidden" name="telefono" value="<?= $telefono ?>">
                                        <input type="hidden" name="domicilio" value="<?= $domicilio ?>">
                                        <input type="hidden" name="fechaIngreso" value="<?= $fechaIngreso ?>">
                                        <input type="hidden" name="sexo" value="<?= $sexo ?>">
                                        <input type="hidden" name="fechaNacimiento" value="<?= $fechaNacimiento ?>">
                                        <button type="submit" class="btn btn-terciario btn-sm">Modificar</button>
                                    </form>
                                    <form action="../../backend/darBajaMedico.php" method="post">
                                        <input type="hidden" name="idMedico" value="<?= $idMedico ?>">
                                        <button type="submit" class="btn btn-rojo btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
                }
                $stmt->close();
            ?>
        </div>
    </div>
</body>

</html>

<?php
        }
    } else {
        $_SESSION['mensaje'] = "Necesitas iniciar sesión";
        header('location: ../paginas/iniciarSesionVisual.php');
    }
?>
