<?php
    include('conexion.php');
    session_start();
    $idPaciente = $_POST['idPaciente'];
    $cantidadMedicamento = $_POST['cantidadMedicamento'];
    $periodoMedicamento = $_POST['periodoMedicamento'];
    $fecha = date("Y-m-d");

    // Preparar la consulta
    $stmt = $conn->prepare("INSERT INTO `recetas`(`idPaciente`, `fecha`, `cantidadMedicamento`, `periodoMedicamentos`, `vigente`) VALUES (?,?,?,?,1)");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('ssss', $idPaciente, $fecha, $cantidadMedicamento, $periodoMedicamento);

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

    $sql = "SELECT idReceta FROM recetas ORDER BY idReceta DESC LIMIT 1;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($idReceta);
    while ($stmt->fetch()) 
    {
        $idEnfermedad = $_POST['idEnfermedad'];
        $idMedicamento = $_POST['idMedicamento'];
        // Preparar la consulta
        if($idMedicamento != 0)
        {
            $stmt = $conn->prepare("INSERT INTO `medicamentos_recetas`(`idReceta`, `idMedicamento`) VALUES (?, ?)");

            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }

            // Vincular parámetros
            $stmt->bind_param('ss', $idReceta, $idMedicamento);

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
            $stmt = $conn->prepare("INSERT INTO `enfermedades_recetas`(`idReceta`, `idEnfermedad`) VALUES (?, ?)");

            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }

            // Vincular parámetros
            $stmt->bind_param('ss', $idReceta, $idEnfermedad);

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

        $_SESSION['mensaje'] = "receta vinculada con éxito";
        header("location: asociarRecetasFormulario.php");
    }
    $stmt->close();
?>