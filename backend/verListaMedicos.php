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
    <div class="container my-5">
        <h2 class="text-center mb-4">Listado de Médicos</h2>
        <?php
            while ($stmt->fetch()) {
        ?>
            <div class="medico-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>ID:</strong> <?= $idMedico ?> <br>
                        <strong>Nombre:</strong> <?= $nombre ?> <?= $apellido ?> <br>
                        <strong>DNI:</strong> <?= $dni ?> <br>
                        <strong>Teléfono:</strong> <?= $telefono ?> <br>
                        <strong>Domicilio:</strong> <?= $domicilio ?> <br>
                        <strong>Fecha de Ingreso:</strong> <?= $fechaIngreso ?> <br>
                        <strong>Sexo:</strong> <?= $sexo ?> <br>
                        <strong>Fecha de Nacimiento:</strong> <?= $fechaNacimiento ?>
                    </div>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) { ?>
                        <form action="../../backend/modificarMedicoFormulario.php" method="post" class="mt-2">
                            <input type="hidden" name="idMedico" value="<?= $idMedico ?>">
                            <input type="hidden" name="nombre" value="<?= $nombre ?>">
                            <input type="hidden" name="apellido" value="<?= $apellido ?>">
                            <input type="hidden" name="dni" value="<?= $dni ?>">
                            <input type="hidden" name="telefono" value="<?= $telefono ?>">
                            <input type="hidden" name="domicilio" value="<?= $domicilio ?>">
                            <input type="hidden" name="fechaIngreso" value="<?= $fechaIngreso ?>">
                            <input type="hidden" name="sexo" value="<?= $sexo ?>">
                            <input type="hidden" name="fechaNacimiento" value="<?= $fechaNacimiento ?>">
                            <button type="submir" class="btn btn-terciario">Modificar</button>
                        </form>
                        <form action="../../backend/darBajaMedico.php" method="post">
                            <input type="hidden" name="idMedico" value="<?= $idMedico ?>">
                            <button type="submit" class="btn btn-terciario">Eliminar</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        <?php
            }
            $stmt->close();
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
        }
    } else {
        $_SESSION['mensaje'] = "Necesitas iniciar sesión";
        header('location: ../paginas/iniciarSesionVisual.php');
    }
?>
