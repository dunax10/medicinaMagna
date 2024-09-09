<?php
    session_start();
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            include('conexion.php');
            $nombre = $_POST['nombre'];
            $nombre = ucfirst($nombre);
            $sql = "SELECT nombre FROM consultorios WHERE nombre = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows == 0)
            {
                $stmt->close();
                $sql = "INSERT INTO `consultorios`(`nombre`) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $nombre);
                $stmt->execute();
                $_SESSION['mensaje'] = "El consultorio fue creado con éxito";
                header("location: crearConsultorioFormulario.php");
            }
            else
            {
                $_SESSION['mensaje'] = "El consultorio $nombre ya existía";
                header("location: crearConsultorioFormulario.php");
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