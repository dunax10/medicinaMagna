<?php
    include('conexion.php');
    session_start();
    $idEmpleado = $_POST['idEmpleado'];
    $nombre = $_POST['nombre'];
    $mail = $_POST['mail'];
    // Preparar la consulta
    $stmt = $conn->prepare("UPDATE empleados SET nombre = ?, mail = ? WHERE idEmpleado = ?;");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) 
    {
        die('Error en la preparación: ' . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param('sss', $nombre, $mail, $idEmpleado);

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

    $_SESSION['mensaje'] = "Empleado modificado exitosamente";
    header('Location: ../paginas/empleados/verListaEmpleadosVisual.php');