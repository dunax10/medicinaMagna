<?php
    include('../conexion/conexion.php');
    session_start();
    $email = $_POST['email'] ?? $email;
    
    // Verificar si el email ya existe en la base de datos
    $sql = "SELECT mail FROM empleados WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if(($stmt->num_rows == 0))
    {
        $nombre = $_POST['nombre'] ?? $nombre;
        $contraseña = $_POST['contraseña'] ?? $contraseña;
        // Preparar la consulta
        $stmt = $conn->prepare("INSERT INTO `empleados`(`nombre`, `mail`, `contraseña`, `admin`, `vigente`) VALUES (?, ?, ?,0, 1)");

        // Verificar si la preparación fue exitosa
        if ($stmt === false) 
        {
            die('Error en la preparación: ' . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param('sss', $nombre, $email, $contraseña);

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

        $_SESSION['mensajeError'] = "Usuario creado con éxito";
        header("location: ../iniciarSesion/iniciarSesionFormulario.php");
    }
    else
    {
        $_SESSION['mensajeError'] = "El mail ya existe";
        header("location: ../iniciarSesion/iniciarSesionFormulario.php");
        $stmt->close();
    }
?>