<?php
    session_start();
    include("conexion.php");
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT mail FROM empleados WHERE mail = ? AND vigente = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if(($stmt->num_rows == 0))
    {
        $stmt->close();
        $_SESSION['mensaje'] = "El mail es incorrecto";
        header("location: crearContraseñaFormulario.php");
    }
    else
    {
        $sql = "SELECT idEmpleado FROM empleados WHERE mail = ? AND contraseña = 'noCreada' AND vigente = 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if(($stmt->num_rows == 0))
        {
            $stmt->close();
            $_SESSION['mensaje'] = "El mail ya tenia una contraseña creada";
            header("location: iniciarSesionFormulario.php");
        }
        else
        {
            $stmt->close();

            $stmt = $conn->prepare("UPDATE `empleados` SET contraseña = ? WHERE mail = ? AND vigente = 1");
            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }
            // Vincular parámetros
            $stmt->bind_param('ss', $contraseña, $email);
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

            include('iniciarSesion.php');

            $_SESSION['mensaje'] = "Usuario iniciado con éxito y contraseña actualizada";
            header("location: iniciarSesionFormulario.php");
        }
    }
?>