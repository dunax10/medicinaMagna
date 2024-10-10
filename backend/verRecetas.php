<?php
    include('conexion.php');
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            $idPaciente = $_GET['idPaciente'];

            $sql = "SELECT * FROM recetas WHERE idPaciente = $idPaciente AND vigente = 1 ORDER BY fecha ASC;";
            //preparo la conexion
            $stmt = $conn->prepare($sql);
            //ejecuto la consulta
            $stmt->execute();
            //almaceno el resultado para verificar
            $stmt->store_result();
            //traigo los resultados de la consulta y la recorro con un while
            $stmt->bind_result($idReceta, $idPaciente, $fecha, $cantidadMedicamento, $periodoMedicamento, $vigente);
            
            while ($stmt->fetch()) 
            {
                $sql = "SELECT idMedicamento FROM medicamentos_recetas WHERE idReceta = $idReceta;";
                //preparo la conexion
                $stmtIdMedicamento = $conn->prepare($sql);
                //ejecuto la consulta
                $stmtIdMedicamento->execute();
                //almaceno el resultado para verificar
                $stmtIdMedicamento->store_result();

                if(!($stmtIdMedicamento->num_rows == 0))
                {
                    //traigo los resultados de la consulta y la recorro con un while
                    $stmtIdMedicamento->bind_result($idMedicamento);
                    while($stmtIdMedicamento->fetch())
                    {
                        $sql = "SELECT nombre FROM medicamentos WHERE idMedicamento = $idMedicamento;";
                        //preparo la conexion
                        $stmtMedicamento = $conn->prepare($sql);
                        //ejecuto la consulta
                        $stmtMedicamento->execute();
                        //almaceno el resultado para verificar
                        $stmtMedicamento->store_result();
                        $stmtMedicamento->bind_result($nombreMedicamento);
                        while($stmtMedicamento->fetch())
                        {
                            if($nombreMedicamento != null)
                            {
                                echo "MEDICAMENTO: $nombreMedicamento ";
                            }
                        }
                        $stmtMedicamento->close();
                    }
                    $stmtIdMedicamento->close();
                }

                $sql = "SELECT idEnfermedad FROM enfermedades_recetas WHERE idReceta = $idReceta;";
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
                        $sql = "SELECT nombre FROM enfermedades WHERE idEnfermedad = $idEnfermedad;";
                        //preparo la conexion
                        $stmtEnfermedad = $conn->prepare($sql);
                        //ejecuto la consulta
                        $stmtEnfermedad->execute();
                        //almaceno el resultado para verificar
                        $stmtEnfermedad->store_result();
                        $stmtEnfermedad->bind_result($nombreEnfermedad);
                        while($stmtEnfermedad->fetch())
                        {
                            if($nombreEnfermedad != null)
                            {
                                echo "ENFERMEDAD: $nombreEnfermedad ";
                            }
                        }
                        $stmtEnfermedad->close();
                    }
                    $stmtIdEnfermedad->close();
                }

                echo "PERIODO DEL MEDICAMENTO: $periodoMedicamento CANTIDAD DEL MEDICAMENTO: $cantidadMedicamento<br>";
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