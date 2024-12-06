<?php
    include('conexion.php');
    $idHistorial = $_POST['idHistorial'];
    $idEnfermedad = $_POST['idEnfermedad'] ?? 0;
    $idMedicamento = $_POST['idMedicamento'] ?? 0;
    $idPaciente = $_POST['idPaciente'];
    $descripcionMalestar = $_POST['descripcionMalestar'];
    $fecha = date("Y-m-d");
    // Preparar la consulta
    $stmt = $conn->prepare("UPDATE historiales_clinicos SET idPaciente = ?, fecha = ?, descripcionMalestar = ? WHERE idHistorial = ?;");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('ssss', $idPaciente, $fecha, $descripcionMalestar, $idHistorial);

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

    // Preparar la consulta
    if($idMedicamento != 0)
    {
        $stmt = $conn->prepare("UPDATE medicamentos_historiales_clinicos SET idMedicamento = ? WHERE idHistorial = ?");

        // Verificar si la preparación fue exitosa
        if ($stmt === false) 
        {
            die('Error en la preparación: ' . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param('ss', $idMedicamento, $idHistorial);

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
        $stmt = $conn->prepare("UPDATE enfermedades_historiales_clinicos SET idEnfermedad = ? WHERE idHistorial = ?");

        // Verificar si la preparación fue exitosa
        if ($stmt === false) 
        {
            die('Error en la preparación: ' . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param('ss', $idEnfermedad, $idHistorial);

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

    $_SESSION['mensaje'] = "historial modificado con éxito";
    header("location: ../paginas/pacientes/verListaPacientesVisual.php");
?>