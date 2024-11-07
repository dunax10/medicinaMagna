<?php
    include('conexion.php');
    session_start();
    $idReceta = $_POST['idReceta'];
    $idEnfermedad = $_POST['idEnfermedad'];
    $idMedicamento = $_POST['idMedicamento'];
    $idPaciente = $_POST['idPaciente'];
    $cantidadMedicamento = $_POST['cantidadMedicamento'];
    $periodoMedicamento = $_POST['periodoMedicamento'];
    $fecha = date("Y-m-d");
    // Preparar la consulta
    $stmt = $conn->prepare("UPDATE recetas SET idPaciente = ?, fecha = ?, cantidadMedicamento = ?, periodoMedicamentos = ? WHERE idReceta = ?;");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('sssss', $idPaciente, $fecha, $cantidadMedicamento, $periodoMedicamento, $idReceta);

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
        $stmt = $conn->prepare("UPDATE medicamentos_recetas SET idMedicamento = ? WHERE idReceta = ?");

        // Verificar si la preparación fue exitosa
        if ($stmt === false) 
        {
            die('Error en la preparación: ' . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param('ss', $idMedicamento, $idReceta);

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
        $stmt = $conn->prepare("UPDATE enfermedades_recetas SET idEnfermedad = ? WHERE idReceta = ?");

        // Verificar si la preparación fue exitosa
        if ($stmt === false) 
        {
            die('Error en la preparación: ' . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param('ss', $idEnfermedad, $idReceta);

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

    $_SESSION['mensaje'] = "receta modificada con éxito";
    header("location: verListaPacientes.php");
?>