<?php
    session_start();
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            include('conexion.php');
            $nombre = $_POST['nombre'];
            $nombre = ucfirst($nombre);
            $sql = "SELECT nombre FROM obras_sociales WHERE nombre = ? AND vigente = 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows == 0)
            {
                $stmt->close();
                $telefono = $_POST['telefono'];
                $sql = "INSERT INTO `obras_sociales`(`nombre`, `telefono`, `vigente`) VALUES (?, ?, 1)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ss', $nombre, $telefono);
                $stmt->execute();
                $_SESSION['mensaje'] = "La obra social fue creada con éxito";
                header("location: agregarObrasSocialesFormulario.php");
            }
            else
            {
                $_SESSION['mensaje'] = "La obra social $nombre ya existía";
                header("location: agregarObrasSocialesFormulario.php");
            }
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador";
            header("location: iniciarSesionFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesión";
        header("location: iniciarSesionFormulario.php");
    }
?>