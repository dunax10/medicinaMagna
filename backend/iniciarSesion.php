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
            $_SESSION['mensaje'] = "La contraseña es incorrecta";
            header("location: iniciarSesionFormulario.php");
        }
        else
        {
            $_SESSION['mensaje'] = "Usuario iniciado con éxito";
            $stmt->bind_result($id);
            while ($stmt->fetch()) 
            {
                $_SESSION['idUsuario'] = $id;
                $_SESSION['medico'] = true;
            }
            $stmt->close();
            header("location: iniciarSesionFormulario.php");
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
        $_SESSION['mensaje'] = "El email es incorrecto";
        header("location: iniciarSesionFormulario.php");
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
            $_SESSION['mensaje'] = "La contraseña es incorrecta";
            header("location: iniciarSesionFormulario.php");
        }
        else
        {
            $_SESSION['mensaje'] = "Usuario iniciado con éxito";
            $stmt->bind_result($id, $admin, $nombre);
            while ($stmt->fetch()) 
            {
                $_SESSION['idUsuario'] = $id;
                $_SESSION['admin'] = $admin;
                $_SESSION['nombreUsuario'] = $nombre;
            }
            $stmt->close();
            header("location: iniciarSesionFormulario.php");
        }
    }
?>