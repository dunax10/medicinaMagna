<?php
    session_start();
    include("conexion.php");
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT mail FROM medicos WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if(($stmt->num_rows != 0))
    {
        $stmt->close();
        $sql = "SELECT idMedico FROM medicos WHERE mail = ? AND contraseña = 'noCreada'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if(($stmt->num_rows == 0))
        {
            $stmt->close();
            $_SESSION['mensajeError'] = "El mail ya tenia una contraseña creada";
            header("location: iniciarSesionFormulario.php");
        }
        else
        {
            $stmt->bind_result($id);
            while ($stmt->fetch()) 
            {
                $_SESSION['idUsuario'] = $id;
                $_SESSION['medico'] = true;
            }
            $stmt->close();

            $stmt = $conn->prepare("UPDATE `medicos` SET contraseña = ? WHERE mail = ?");
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
        }
    }


    $stmt->close();
    $sql = "SELECT mail FROM empleados WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if(($stmt->num_rows == 0))
    {
        $stmt->close();
        $_SESSION['mensajeError'] = "El mail es incorrecto";
        header("location: iniciarSesionFormulario.php");
    }
    else
    {
        $sql = "SELECT idEmpleado, administrador FROM empleados WHERE mail = ? AND contraseña = 'noCreada'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if(($stmt->num_rows == 0))
        {
            $stmt->close();
            $_SESSION['mensajeError'] = "El mail ya tenia una contraseña creada";
            header("location: iniciarSesionFormulario.php");
        }
        else
        {
            $stmt->bind_result($id);
            while ($stmt->fetch()) 
            {
                $_SESSION['idUsuario'] = $id;
                $_SESSION['admin'] = $admin;
                $_SESSION['nombreUsuario'] = $nombre;
            }
            $stmt->close();

            $stmt = $conn->prepare("UPDATE `empleados` SET contraseña = ? WHERE mail = ?");
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

            $_SESSION['mensaje'] = "Usuario iniciado con éxito y contraseña actualizada";
            header("location: iniciarSesionFormulario.php");
        }
    }
?>