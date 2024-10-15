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
            $stmt->bind_result($idMedico, $nombre, $apellido, $sexo, $dni, $fechaNacimiento, $fechaIngreso, $telefono, $domicilio, $disponibilidad, $idEmpleado, $vigente);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Médicos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .medico-card {
            padding: 1rem;
            background-color: #f8f9fa;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Médicos</h1>
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
                        <form action="darBajaMedico.php" method="post">
                            <input type="hidden" name="idMedico" value="<?= $idMedico ?>">
                            <button type="submit" class="btn btn-delete">Eliminar</button>
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
        header('location: iniciarSesionFormulario.php');
    }
?>
