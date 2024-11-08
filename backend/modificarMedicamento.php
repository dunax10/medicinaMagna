<?php
    include('conexion.php');
    session_start();
    $idMedicamento = $_POST['idMedicamento'];
    $nombre = $_POST['nombre'];
    // Preparar la consulta
    $stmt = $conn->prepare("UPDATE medicamentos SET nombre = ? WHERE idMedicamento = ?;");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('si', $nombre, $idMedicamento);

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

    $_SESSION['mensaje'] = "Medicamento modificado exitosamente";
    header('Location: ../paginas/medicamentos/verListaMedicamentosVisual.php');