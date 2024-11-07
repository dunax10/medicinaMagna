<?php
    include('conexion.php');
    session_start();
    $idConsultorio = $_POST['idConsultorio'];
    $nombre = $_POST['nombre'];
    // Preparar la consulta
    $stmt = $conn->prepare("UPDATE consultorios SET nombre = ? WHERE idConsultorio = ?;");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('si', $nombre, $idConsultorio);

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

    $_SESSION['mensaje'] = "Consultorio modificado exitosamente";
    header('Location: verListaConsultorios.php');