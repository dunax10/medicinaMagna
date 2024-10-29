<?php
    include('conexion.php');
    include('mensaje.php');
    session_start();

    if (isset($_SESSION['medico']) && $_SESSION['medico'] == true) {
        $idPaciente = $_GET['idPaciente'];

        // Consulta para obtener las recetas del paciente
        $sql = "SELECT * FROM recetas WHERE idPaciente = ? ORDER BY fecha ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $idPaciente);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idReceta, $idPaciente, $fecha, $cantidadMedicamento, $periodoMedicamento, $vigente);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas del Paciente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .receta-card {
            padding: 1rem;
            background-color: #f8f9fa;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
        .receta-header {
            background-color: #007bff;
            color: white;
            padding: 0.5rem;
            border-radius: 8px 8px 0 0;
        }
        .medicamento-info, .enfermedad-info {
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Recetas del Paciente</h1>
        <div class="row">
        <?php
            while ($stmt->fetch()) {
        ?>
            <div class="col-md-6">
                <div class="receta-card">
                    <div class="receta-header">
                        <h5>Receta del <?= date("d/m/Y", strtotime($fecha)); ?></h5>
                    </div>
                    <div class="receta-body">
                        <strong>Medicamentos:</strong>
                        <ul>
                            <?php
                                // Obtener medicamentos para esta receta
                                $sqlMedicamentos = "SELECT nombre FROM medicamentos WHERE idMedicamento IN 
                                                    (SELECT idMedicamento FROM medicamentos_recetas WHERE idReceta = ?)";
                                $stmtMedicamento = $conn->prepare($sqlMedicamentos);
                                $stmtMedicamento->bind_param('i', $idReceta);
                                $stmtMedicamento->execute();
                                $stmtMedicamento->store_result();
                                $stmtMedicamento->bind_result($nombreMedicamento);
                                while ($stmtMedicamento->fetch()) {
                                    echo "<li class='medicamento-info'>$nombreMedicamento</li>";
                                }
                                $stmtMedicamento->close();
                            ?>
                        </ul>
                        <strong>Enfermedades:</strong>
                        <ul>
                            <?php
                                // Obtener enfermedades para esta receta
                                $sqlEnfermedades = "SELECT nombre FROM enfermedades WHERE idEnfermedad IN 
                                                    (SELECT idEnfermedad FROM enfermedades_recetas WHERE idReceta = ?)";
                                $stmtEnfermedad = $conn->prepare($sqlEnfermedades);
                                $stmtEnfermedad->bind_param('i', $idReceta);
                                $stmtEnfermedad->execute();
                                $stmtEnfermedad->store_result();
                                $stmtEnfermedad->bind_result($nombreEnfermedad);
                                while ($stmtEnfermedad->fetch()) {
                                    echo "<li class='enfermedad-info'>$nombreEnfermedad</li>";
                                }
                                $stmtEnfermedad->close();
                            ?>
                        </ul>
                        <p><strong>Periodo del Medicamento:</strong> <?= $periodoMedicamento ?></p>
                        <p><strong>Cantidad del Medicamento:</strong> <?= $cantidadMedicamento ?></p>
                    </div>
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
