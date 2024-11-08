<?php
    include('conexion.php');
    session_start();
    
    if(isset($_SESSION['idUsuario'])) {
        $idUsuario = $_SESSION['idUsuario'];

        // Consulta para obtener las consultas vigentes
        $sql = "SELECT c.*, m.nombre, p.nombre FROM consultas AS c JOIN medicos AS m ON m.idMedico = c.idMedico JOIN pacientes AS p ON p.idPaciente = c.idPaciente ORDER BY c.fecha ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idConsulta, $idMedico, $idPaciente, $fecha, $hora, $nombreMedico, $nombrePaciente);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de consultas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .medicina-card {
            padding: 1rem;
            background-color: #f8f9fa;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Consultas</h1>
        <div class="row">
        <?php
            while ($stmt->fetch()) {
        ?>
            <div class="col-md-4">
                <div class="medicina-card">
                    <strong>ID:</strong> <?= $idConsulta ?> <br>
                    <strong>Nombre del medico:</strong> <?= $nombreMedico ?> <br>
                    <strong>Nombre del paciente:</strong> <?= $nombrePaciente ?> <br>
                    <strong>Fecha:</strong> <?= $fecha ?> <br>
                    <strong>Hora:</strong> <?= $hora ?> <br>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                        <form action="../../backend/darBajaConsultas.php" method="post" class="mt-2">
                            <input type="hidden" name="idConsulta" value="<?= $idConsulta ?>">
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
        header('location: ../iniciarSesionVisual.php');
    }
?>
