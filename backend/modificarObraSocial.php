<?php
    include('conexion.php');
    session_start();
    $idObraSocial = $_POST['idObraSocial'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    // Preparar la consulta
    $stmt = $conn->prepare("UPDATE obras_sociales SET nombre = ?, telefono = ? WHERE idObraSocial = ?;");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('sss', $nombre, $telefono, $idObraSocial);

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

    $_SESSION['mensaje'] = "obra social modificada exitosamente";
    header('Location: ../paginas/obrasSociales/verListaObrasSocialesVisual.php');