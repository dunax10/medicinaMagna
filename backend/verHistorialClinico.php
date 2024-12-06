<?php
include('conexion.php');
include('mensaje.php');
if(isset($_SESSION['medico'])) {
    echo "<div class='container'>";
    if($_SESSION['medico'] == true) {
        $idPaciente = $_GET['idPaciente'];

        $sql = "SELECT hc.*, p.nombre FROM historiales_clinicos AS hc JOIN pacientes AS p ON hc.idPaciente = p.idPaciente WHERE hc.idPaciente = $idPaciente ORDER BY hc.fecha ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 0) {
            $_SESSION['mensaje'] = "No tiene historial clínico registrado";
            header('location: ../pacientes/verListaPacientesVisual.php');
        }

        $stmt->bind_result($idHistorial, $idPaciente, $fecha, $descripcionMalestar, $nombrePaciente);

        echo "<div class='row'>"; // Inicio de la fila para las columnas
        $counter = 0; // Contador para determinar cuándo cerrar y abrir filas

        while ($stmt->fetch()) {   
            echo "<div class='col-md-6 mb-4'>"; // Cada registro ocupa la mitad del ancho
            echo "<div class='border p-3'>"; // Contenedor con estilo para cada registro

            // Medicamentos asociados al historial
            $sql = "SELECT idMedicamento FROM medicamentos_historiales_clinicos WHERE idHistorial = $idHistorial;";
            $stmtIdMedicamento = $conn->prepare($sql);
            $stmtIdMedicamento->execute();
            $stmtIdMedicamento->store_result();

            if ($_SESSION['admin'] == true): ?>
                <form action="modificarHistorialClinicoVisual.php" method="post" class="mt-2">
                    <input type="hidden" name="idHistorial" value="<?= $idHistorial ?>">
                    <input type="hidden" name="idPaciente" value="<?= $idPaciente ?>">
                    <input type="hidden" name="nombrePaciente" value="<?= $nombrePaciente ?>">
                    <input type="hidden" name="fecha" value="<?= $fecha ?>">
                    <input type="hidden" name="descripcionMalestar" value="<?= $descripcionMalestar ?>">
            <?php endif;

            if(!($stmtIdMedicamento->num_rows == 0)) {
                $stmtIdMedicamento->bind_result($idMedicamento);
                while($stmtIdMedicamento->fetch()) {
                    $sql = "SELECT nombre FROM medicamentos WHERE idMedicamento = $idMedicamento AND vigente = 1;";
                    $stmtMedicamento = $conn->prepare($sql);
                    $stmtMedicamento->execute();
                    $stmtMedicamento->store_result();
                    $stmtMedicamento->bind_result($nombreMedicamento);
                    while($stmtMedicamento->fetch()) {
                        if($nombreMedicamento != null) {
                            echo "<p>MEDICAMENTO: $nombreMedicamento</p>";
                            if ($_SESSION['admin'] == true):
                                echo "<input type='hidden' name='nombreMedicamento' value='$nombreMedicamento'>";
                            endif;
                        }
                    }
                    $stmtMedicamento->close();
                }
                $stmtIdMedicamento->close();
            }

            // Enfermedades asociadas al historial
            $sql = "SELECT idEnfermedad FROM enfermedades_historiales_clinicos WHERE idHistorial = $idHistorial;";
            $stmtIdEnfermedad = $conn->prepare($sql);
            $stmtIdEnfermedad->execute();
            $stmtIdEnfermedad->store_result();

            if(!($stmtIdEnfermedad->num_rows == 0)) {
                $stmtIdEnfermedad->bind_result($idEnfermedad);
                while($stmtIdEnfermedad->fetch()) {
                    $sql = "SELECT nombre FROM enfermedades WHERE idEnfermedad = $idEnfermedad AND vigente = 1;";
                    $stmtEnfermedad = $conn->prepare($sql);
                    $stmtEnfermedad->execute();
                    $stmtEnfermedad->store_result();
                    $stmtEnfermedad->bind_result($nombreEnfermedad);
                    while($stmtEnfermedad->fetch()) {
                        if($nombreEnfermedad != null) {
                            echo "<p>ENFERMEDAD: $nombreEnfermedad</p>";
                            if ($_SESSION['admin'] == true):
                                echo "<input type='hidden' name='nombreEnfermedad' value='$nombreEnfermedad'>";
                            endif;
                        }
                    }
                    $stmtEnfermedad->close();
                }
                $stmtIdEnfermedad->close();
            }
            echo "<p>DESCRIPCIÓN DEL MALESTAR: $descripcionMalestar</p>";
            echo "<input type='submit' class='btn btn-terciario' value='Modificar'>";
            echo "</form>";
            echo "</div>"; // Cierra border p-3
            echo "</div>"; // Cierra col-md-6

            $counter++;
            // Si se han colocado 2 elementos, cerrar la fila y abrir otra
            if ($counter % 2 == 0) {
                echo "</div><div class='row'>";
            }
        }
        echo "</div>"; // Cierra la última fila
        $stmt->close();
    }
    echo "</div>"; // Cierra el container
} else {
    $_SESSION['mensaje'] = "Necesitas iniciar sesion";
    header('location: ../paginas/iniciarSesionVisual.php');
}
?>
