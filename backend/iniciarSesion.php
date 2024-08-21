<?php
    session_start();
    include("../conexion/conexion.php");
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT mail FROM medicos WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if(($stmt->num_rows == 0))
    {
        $sql = "SELECT idMedico FROM medicos WHERE mail = ? AND contraseña = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $email, $contraseña);
        $stmt->execute();
        $stmt->store_result();
        if(($stmt->num_rows == 0))
        {
            $stmt->close();
            $_SESSION['mensajeError'] = "La contraseña es incorrecta";
            header("location: ../iniciarSesion/iniciarSesionFormulario.php");
        }
        else
        {
            $_SESSION['mensajeError'] = "Usuario iniciado con éxito";
            $stmt->bind_result($id);
            while ($stmt->fetch()) 
            {
                $_SESSION['idUsuario'] = $id;
                $_SESSION['medico'] = true;
            }
            $stmt->close();
            header("location: ../iniciarSesion/iniciarSesionFormulario.php");
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
        $_SESSION['mensajeError'] = "El email es incorrecto";
        header("location: ../iniciarSesion/iniciarSesionFormulario.php");
    }
    else
    {
        $sql = "SELECT idEmpleado, administrador, nombre FROM empleados WHERE mail = ? AND contraseña = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $email, $contraseña);
        $stmt->execute();
        $stmt->store_result();
        if(($stmt->num_rows == 0))
        {
            $stmt->close();
            $_SESSION['mensajeError'] = "La contraseña es incorrecta";
            header("location: ../iniciarSesion/iniciarSesionFormulario.php");
        }
        else
        {
            $_SESSION['mensajeError'] = "Usuario iniciado con éxito";
            $stmt->bind_result($id, $admin, $nombre);
            while ($stmt->fetch()) 
            {
                $_SESSION['idUsuario'] = $id;
                $_SESSION['admin'] = $admin;
                $_SESSION['nombreUsuario'] = $nombre;
            }
            $stmt->close();
            header("location: ../iniciarSesion/iniciarSesionFormulario.php");
        }
    }
?>