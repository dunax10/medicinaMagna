<?php
    include('conexion.php');
    include('mensaje.php');
    session_start();

    if (isset($_SESSION['medico']) && $_SESSION['medico'] == true) {
        $idUsuario = $_SESSION['idUsuario'];

        $sql = "SELECT * FROM pacientes WHERE vigente = 1 ORDER BY nombre ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idPaciente, $nombre, $apellido, $dni, $telefono, $domicilio, $tipoSangre, $sexo, $fechaNacimiento, $mail, $vigente);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .patient-card {
            padding: 1rem;
            background-color: #f8f9fa;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.25rem 0.5rem;
            border-radius: 5px;
            cursor: pointer;
        }
        .action-links a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Pacientes</h1>
        <div class="row">
        <?php
            while ($stmt->fetch()) {
        ?>
            <div class="col-md-6">
                <div class="patient-card">
                    <strong>ID:</strong> <?= $idPaciente ?> <br>
                    <strong>Nombre:</strong> <?= $nombre ?> <br>
                    <strong>Apellido:</strong> <?= $apellido ?> <br>
                    <strong>DNI:</strong> <?= $dni ?> <br>
                    <strong>Teléfono:</strong> <?= $telefono ?> <br>
                    <strong>Domicilio:</strong> <?= $domicilio ?> <br>
                    <strong>Tipo de Sangre:</strong> <?= $tipoSangre ?> <br>
                    <strong>Sexo:</strong> <?= $sexo ?> <br>
                    <strong>Fecha de Nacimiento:</strong> <?= $fechaNacimiento ?> <br>
                    <strong>Email:</strong> <?= $mail ?> <br>

                    <div class="action-links mt-3">
                        <a href="verHistorialClinico.php?idPaciente=<?= $idPaciente ?>" class="btn btn-info">Historial Clínico</a>
                        <a href="verRecetas.php?idPaciente=<?= $idPaciente ?>" class="btn btn-primary">Recetas</a>
                    </div>

                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                        <form action="darBajaPacientes.php" method="post" class="mt-3">
                            <input type="hidden" name="idPaciente" value="<?= $idPaciente ?>">
                            <button type="submit" class="delete-btn">Eliminar</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php
            }
            $stmt->close();
        ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    } else {
        $_SESSION['mensaje'] = "Necesitas iniciar sesión";
        header('location: iniciarSesionFormulario.php');
    }
?>
