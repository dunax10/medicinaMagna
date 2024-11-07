<?php
    include('conexion.php');
    session_start();
    $idPaciente = $_POST['idPaciente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $tipoSangre = $_POST['tipoSangre'];
    $telefono = $_POST['telefono'];
    $domicilio = $_POST['domicilio'];
    $mail = $_POST['mail'];
    $dni = $_POST['dni'];
    // Preparar la consulta
    $stmt = $conn->prepare("UPDATE pacientes SET nombre = ?, fechaNacimiento = ?, apellido = ?, sexo = ?, tipoSangre = ?, telefono = ?, domicilio = ?, mail = ?, dni = ? WHERE idPaciente = ?;");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('ssssssssss', $nombre, $fechaNacimiento, $apellido, $sexo, $tipoSangre, $telefono, $domicilio, $mail, $dni, $idPaciente);

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

    $_SESSION['mensaje'] = "Paciente modificado exitosamente";
    header('Location: verListaPacientes.php');