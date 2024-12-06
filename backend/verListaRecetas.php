<?php
    include('conexion.php');
    include('mensaje.php');
    $nombreEnfermedadPDF;
    $nombreMedicamentoPDF;

    if (isset($_SESSION['medico']) && $_SESSION['medico'] == true){
        $idPaciente = $_GET['idPaciente'];

        // Consulta para obtener las recetas del paciente
        $sql = "SELECT r.*, p.nombre FROM recetas AS r JOIN pacientes AS p ON r.idPaciente = p.idPaciente WHERE r.idPaciente = ? ORDER BY r.fecha ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $idPaciente);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows == 0)
        {
            $_SESSION['mensaje'] = "No tiene recetas";
            header('location: ../../pacientes/verListaPacientesVisual.php');
        }
        $stmt->bind_result($idReceta, $idPaciente, $fecha, $cantidadMedicamento, $periodoMedicamento, $nombrePaciente);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas del Paciente</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Recetas del Paciente</h1>
        <div class="row">
            <?php while ($stmt->fetch()) : ?>
                <div class="col-md-4 mb-4">
                    <!-- Tarjeta de receta -->
                    <div class="card border-0 shadow p-3 h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Receta del <?= date("d/m/Y", strtotime($fecha)); ?></h5>
                        </div>
                        <div class="card-body">
                            <strong>Medicamentos:</strong>
                            <ul>
                                <?php
                                    $sqlMedicamentos = "SELECT nombre, idMedicamento FROM medicamentos WHERE idMedicamento IN 
                                                        (SELECT idMedicamento FROM medicamentos_recetas WHERE idReceta = ?)";
                                    $stmtMedicamento = $conn->prepare($sqlMedicamentos);
                                    $stmtMedicamento->bind_param('i', $idReceta);
                                    $stmtMedicamento->execute();
                                    $stmtMedicamento->store_result();
                                    $stmtMedicamento->bind_result($nombreMedicamento, $idMedicamento);
                                    while ($stmtMedicamento->fetch()) {
                                        echo "<li>$nombreMedicamento</li>";
                                    }
                                    $stmtMedicamento->close();
                                ?>
                            </ul>
                            <strong>Enfermedades:</strong>
                            <ul>
                                <?php
                                    $sqlEnfermedades = "SELECT nombre, idEnfermedad FROM enfermedades WHERE idEnfermedad IN 
                                                        (SELECT idEnfermedad FROM enfermedades_recetas WHERE idReceta = ?)";
                                    $stmtEnfermedad = $conn->prepare($sqlEnfermedades);
                                    $stmtEnfermedad->bind_param('i', $idReceta);
                                    $stmtEnfermedad->execute();
                                    $stmtEnfermedad->store_result();
                                    $stmtEnfermedad->bind_result($nombreEnfermedad, $idEnfermedad);
                                    while ($stmtEnfermedad->fetch()) {
                                        echo "<li>$nombreEnfermedad</li>";
                                    }
                                    $stmtEnfermedad->close();
                                ?>
                            </ul>
                            <p><strong>Periodo del Medicamento:</strong> <?= $periodoMedicamento ?></p>
                            <p><strong>Cantidad del Medicamento:</strong> <?= $cantidadMedicamento ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <?php if ($_SESSION['admin'] == true) : ?>
                                <form action="../../backend/modificarRecetaFormulario.php" method="post">
                                    <input type="hidden" name="idReceta" value="<?= $idReceta ?>">
                                    <button type="submit" class="btn btn-secundario">Modificar</button>
                                </form>
                                <form action="../../backend/darBajaReceta.php" method="post">
                                    <input type="hidden" name="idReceta" value="<?= $idReceta ?>">
                                    <button type="submit" class="btn btn-rojo">Eliminar</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>

<?php
    } else {
        $_SESSION['mensaje'] = "Necesitas iniciar sesión";
        header('location: ../paginas/iniciarSesionVisual.php');
    }
?>
