<?php
    include('conexion.php');
    session_start();
    $idMedico = $_POST['idMedico'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $domicilio = $_POST['domicilio'];
    $fechaIngreso = $_POST['fechaIngreso'];
    $sexo = $_POST['sexo'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    // Preparar la consulta
    $stmt = $conn->prepare("UPDATE medicos SET nombre = ?, dni = ?, telefono = ?, sexo = ?, domicilio = ?, fechaIngreso = ?, fechaNacimiento = ? WHERE idMedico = ?;");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('ssssssss', $nombre, $dni, $telefono, $sexo, $domicilio, $fechaIngreso, $fechaNacimiento, $idMedico);

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

    $_SESSION['mensaje'] = "Medico modificado exitosamente";
    header('Location: ../paginas/verListaMedicos.php');