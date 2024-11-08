<?php
    include('conexion.php');
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            $idPaciente = $_GET['idPaciente'];

            $sql = "SELECT hc.*, p.nombre FROM historiales_clinicos AS hc JOIN pacientes AS p ON hc.idPaciente = p.idPaciente WHERE hc.idPaciente = $idPaciente ORDER BY hc.fecha ASC;";
            //preparo la conexion
            $stmt = $conn->prepare($sql);
            //ejecuto la consulta
            $stmt->execute();
            //almaceno el resultado para verificar
            $stmt->store_result();
            if($stmt->num_rows == 0)
            {
                $_SESSION['mensaje'] = "No tiene historial clínico registrado";
                header('location: verListaPacientes.php');
            }
            //traigo los resultados de la consulta y la recorro con un while
            $stmt->bind_result($idHistorial, $idPaciente, $fecha, $descripcionMalestar, $nombrePaciente);
            while ($stmt->fetch()) 
            {
                $sql = "SELECT idMedicamento FROM medicamentos_historiales_clinicos WHERE idHistorial = $idHistorial;";
                //preparo la conexion
                $stmtIdMedicamento = $conn->prepare($sql);
                //ejecuto la consulta
                $stmtIdMedicamento->execute();
                //almaceno el resultado para verificar
                $stmtIdMedicamento->store_result();

                if ($_SESSION['admin'] == true): ?>
                    <form action="../backend/modificarHistorialClinicoFormulario.php" method="post" class="mt-2">
                        <input type="hidden" name="idHistorial" value="<?= $idHistorial ?>">
                        <input type="hidden" name="idPaciente" value="<?= $idPaciente ?>">
                        <input type="hidden" name="nombrePaciente" value="<?= $nombrePaciente ?>">
                        <input type="hidden" name="fecha" value="<?= $fecha ?>">
                        <input type="hidden" name="descripcionMalestar" value="<?= $descripcionMalestar ?>">
                <?php endif;

                if(!($stmtIdMedicamento->num_rows == 0))
                {
                    //traigo los resultados de la consulta y la recorro con un while
                    $stmtIdMedicamento->bind_result($idMedicamento);
                    while($stmtIdMedicamento->fetch())
                    {
                        $sql = "SELECT nombre, idMedicamento FROM medicamentos WHERE idMedicamento = $idMedicamento AND vigente = 1;";
                        //preparo la conexion
                        $stmtMedicamento = $conn->prepare($sql);
                        //ejecuto la consulta
                        $stmtMedicamento->execute();
                        //almaceno el resultado para verificar
                        $stmtMedicamento->store_result();
                        $stmtMedicamento->bind_result($nombreMedicamento, $idMedicamento);
                        while($stmtMedicamento->fetch())
                        {
                            if($nombreMedicamento != null)
                            {
                                echo "MEDICAMENTO: $nombreMedicamento ";
                                if ($_SESSION['admin'] == true):
                                    echo "<input type='hidden' name='nombreMedicamento' value='$nombreMedicamento'>";
                                    echo "<input type='hidden' name='idMedicamento' value='$idMedicamento'>";
                                endif;
                            }
                        }
                        $stmtMedicamento->close();
                    }
                    $stmtIdMedicamento->close();
                }

                $sql = "SELECT idEnfermedad FROM enfermedades_historiales_clinicos WHERE idHistorial = $idHistorial;";
                //preparo la conexion
                $stmtIdEnfermedad = $conn->prepare($sql);
                //ejecuto la consulta
                $stmtIdEnfermedad->execute();
                //almaceno el resultado para verificar
                $stmtIdEnfermedad->store_result();

                if(!($stmtIdEnfermedad->num_rows == 0))
                {
                    //traigo los resultados de la consulta y la recorro con un while
                    $stmtIdEnfermedad->bind_result($idEnfermedad);
                    while($stmtIdEnfermedad->fetch())
                    {
                        $sql = "SELECT nombre, idEnfermedad FROM enfermedades WHERE idEnfermedad = $idEnfermedad AND vigente = 1;";
                        //preparo la conexion
                        $stmtEnfermedad = $conn->prepare($sql);
                        //ejecuto la consulta
                        $stmtEnfermedad->execute();
                        //almaceno el resultado para verificar
                        $stmtEnfermedad->store_result();
                        $stmtEnfermedad->bind_result($nombreEnfermedad, $idEnfermedad);
                        while($stmtEnfermedad->fetch())
                        {
                            if($nombreEnfermedad != null)
                            {
                                echo "ENFERMEDAD: $nombreEnfermedad ";
                                if ($_SESSION['admin'] == true):
                                    echo "<input type='hidden' name='nombreEnfermedad' value='$nombreEnfermedad'>";
                                    echo "<input type='hidden' name='idEnfermedad' value='$idEnfermedad'>";
                                endif;
                            }
                        }
                        $stmtEnfermedad->close();
                    }
                    $stmtIdEnfermedad->close();
                }

                echo "DESCRIPCION DEL MALESTAR: $descripcionMalestar<br><input type='submit' value='Modificar'></form>";
            }
            $stmt->close();
        }

    }
    else
    {
        $_SESSION['mensaje'] = "Necesitas iniciar sesion";
        header('location: iniciarSesionFormulario.php');
    }
?>