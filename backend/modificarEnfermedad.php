<?php
    include('conexion.php');
    session_start();
    $idEnfermedad = $_POST['idEnfermedad'];
    $nombre = $_POST['nombre'];
    // Preparar la consulta
    $stmt = $conn->prepare("UPDATE enfermedades SET nombre = ? WHERE idEnfermedad = ?;");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('ss', $nombre, $idEnfermedad);

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

    $_SESSION['mensaje'] = "Enfermedad modificada exitosamente";
    header('Location: verListaEnfermedades.php');