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
            header('location: verListaPacientes.php');
        }
        $stmt->bind_result($idReceta, $idPaciente, $fecha, $cantidadMedicamento, $periodoMedicamento, $nombrePaciente);
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
            while ($stmt->fetch()) :
        ?>
            <div class="col-md-6">
                <div class="receta-card">
                    <div class="receta-header">
                        <?php if ($_SESSION['admin'] == true): ?>
                            <form action="modificarRecetaFormulario.php" method="post" class="mt-2">
                                <input type="hidden" name="idReceta" value="<?= $idReceta ?>">
                                <input type="hidden" name="idPaciente" value="<?= $idPaciente ?>">
                                <input type="hidden" name="nombrePaciente" value="<?= $nombrePaciente ?>">
                                <input type="hidden" name="fecha" value="<?= $fecha ?>">
                                <input type="hidden" name="periodo" value="<?= $periodoMedicamento ?>">
                                <input type="hidden" name="cantidad" value="<?= $cantidadMedicamento ?>">
                        <?php endif; ?>
                            <h5>Receta del <?= date("d/m/Y", strtotime($fecha)); ?></h5>
                        </div>
                        <div class="receta-body">
                            <strong>Medicamentos:</strong>
                            <ul>
                                <?php
                                    // Obtener medicamentos para esta receta
                                    $sqlMedicamentos = "SELECT nombre, idMedicamento FROM medicamentos WHERE idMedicamento IN 
                                                        (SELECT idMedicamento FROM medicamentos_recetas WHERE idReceta = ?)";
                                    $stmtMedicamento = $conn->prepare($sqlMedicamentos);
                                    $stmtMedicamento->bind_param('i', $idReceta);
                                    $stmtMedicamento->execute();
                                    $stmtMedicamento->store_result();
                                    $stmtMedicamento->bind_result($nombreMedicamento, $idMedicamento);
                                    while ($stmtMedicamento->fetch()) {
                                        echo "<li class='medicamento-info'>$nombreMedicamento</li>";
                                        if ($_SESSION['admin'] == true):
                                            echo "<input type='hidden' name='nombreMedicamento' value='$nombreMedicamento'>";
                                            echo "<input type='hidden' name='idMedicamento' value='$idMedicamento'>";
                                            $nombreMedicamentoPDF = $nombreMedicamento;
                                        endif;
                                    }
                                    $stmtMedicamento->close();
                                ?>
                            </ul>
                            <strong>Enfermedades:</strong>
                            <ul>
                                <?php
                                    // Obtener enfermedades para esta receta
                                    $sqlEnfermedades = "SELECT nombre, idEnfermedad FROM enfermedades WHERE idEnfermedad IN 
                                                        (SELECT idEnfermedad FROM enfermedades_recetas WHERE idReceta = ?)";
                                    $stmtEnfermedad = $conn->prepare($sqlEnfermedades);
                                    $stmtEnfermedad->bind_param('i', $idReceta);
                                    $stmtEnfermedad->execute();
                                    $stmtEnfermedad->store_result();
                                    $stmtEnfermedad->bind_result($nombreEnfermedad, $idEnfermedad);
                                    while ($stmtEnfermedad->fetch()) {
                                        echo "<li class='enfermedad-info'>$nombreEnfermedad</li>";
                                        if ($_SESSION['admin'] == true):
                                            echo "<input type='hidden' name='nombreEnfermedad' value='$nombreEnfermedad'>";
                                            echo "<input type='hidden' name='idEnfermedad' value='$idEnfermedad'>";
                                            $nombreEnfermedadPDF = $nombreEnfermedad;
                                        endif;
                                    }
                                    $stmtEnfermedad->close();
                                ?>
                            </ul>
                            <p><strong>Periodo del Medicamento:</strong> <?= $periodoMedicamento ?></p>
                            <p><strong>Cantidad del Medicamento:</strong> <?= $cantidadMedicamento ?></p>
                            <button type="submit" class="delete-btn">Modificar</button>
                            <?php if ($_SESSION['admin'] == true): ?>
                            </form>

                            <!-- Nuevo formulario para enviar los mismos datos -->
                            <form action="pasarHTMLaPDF.php" method="post" class="mt-2">
                                <input type="hidden" name="idReceta" value="<?= $idReceta ?>">
                                <input type="hidden" name="nombrePaciente" value="<?= $nombrePaciente ?>">
                                <input type="hidden" name="fecha" value="<?= $fecha ?>">
                                <input type="hidden" name="periodo" value="<?= $periodoMedicamento ?>">
                                <input type="hidden" name="cantidad" value="<?= $cantidadMedicamento ?>">
                                <input type="hidden" name="nombreMedicamento" value="<?= $nombreMedicamento ?>">
                                <input type="hidden" name="nombreEnfermedad" value="<?= $nombreEnfermedad ?>">
                                <input type="submit" class="btn btn-secondary" value="Crear pdf">
                            </form>

                            <form action="darBajaReceta.php" method="post" class="mt-2">
                                <input type="hidden" name="idReceta" value="<?= $idReceta ?>">
                                <button type="submit" class="delete-btn">Eliminar</button>
                            </form>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            endwhile;
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
