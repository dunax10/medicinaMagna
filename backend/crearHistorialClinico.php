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

    // Cerrar la declaración
    $stmt->close();

    $_SESSION['mensaje'] = "Asocie la/s enfermedad/es y si hay medicamento/s tambien";
    header("location: asociarHistoriasClinicas.php");
?>