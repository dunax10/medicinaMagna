<?php
    include('conexion.php');
    
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
</head>
<body>
    <div class="container m-1">
        <h1 class="text-center my-3">Listado de Consultas</h1>
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
</body>
</html>

<?php
    } else {
        $_SESSION['mensaje'] = "Necesitas iniciar sesión";
        header('location: ../iniciarSesionVisual.php');
    }
?>
