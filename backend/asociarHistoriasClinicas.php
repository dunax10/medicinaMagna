<?php
    include('conexion.php');
    session_start();
    $idPaciente = $_POST['idPaciente'];
    $descripcionMalestar = $_POST['descripcionMalestar'];
    $fecha = date("Y-m-d");

    // Preparar la consulta
    $stmt = $conn->prepare("INSERT INTO `historiales_clinicos`(`idPaciente`, `fecha`, `descripcionMalestar`) VALUES (?,?,?)");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('sss', $idPaciente, $fecha, $descripcionMalestar);

    // Ejecutar la consulta
    $resultado = $stmt->execute();

    // Verificar si la ejecución fue exitosa
    if ($resultado === false) 
    {
        die('Error en la ejecución: ' . $stmt->error);
    } 
    else 
    {
        echo "Registro insertado exitosamente.";
    }
    $stmt->close();

    $sql = "SELECT idHistorial FROM historiales_clinicos ORDER BY idHistorial DESC LIMIT 1 WHERE vigente = 1;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($idHistorial);
    while ($stmt->fetch()) 
    {
        $idEnfermedad = $_POST['idEnfermedad'];
        $idMedicamento = $_POST['idMedicamento'];
        // Preparar la consulta
        if($idMedicamento != 0)
        {
            $stmt = $conn->prepare("INSERT INTO `medicamentos_historiales_clinicos`(`idHistorial`, `idMedicamento`) VALUES (?, ?)");

            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }

            // Vincular parámetros
            $stmt->bind_param('ss', $idHistorial, $idMedicamento);

            // Ejecutar la consulta
            $resultado = $stmt->execute();

            // Verificar si la ejecución fue exitosa
            if ($resultado === false) 
            {
                die('Error en la ejecución: ' . $stmt->error);
            } 
            else 
            {
                echo "Registro insertado exitosamente.";
            }

            // Cerrar la declaración
            $stmt->close();
        }

        if($idEnfermedad != 0)
        {
            $stmt = $conn->prepare("INSERT INTO `enfermedades_historiales_clinicos`(`idHistorial`, `idEnfermedad`) VALUES (?, ?)");

            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }

            // Vincular parámetros
            $stmt->bind_param('ss', $idHistorial, $idEnfermedad);

            // Ejecutar la consulta
            $resultado = $stmt->execute();

            // Verificar si la ejecución fue exitosa
            if ($resultado === false) 
            {
                die('Error en la ejecución: ' . $stmt->error);
            } 
            else 
            {
                echo "Registro insertado exitosamente.";
            }

            // Cerrar la declaración
            $stmt->close();
        }

        $_SESSION['mensaje'] = "historial vinculado con éxito";
        $stmt->close();
        header("location: asociarHistoriasClinicasFormulario.php");
    }
    $stmt->close();
?>