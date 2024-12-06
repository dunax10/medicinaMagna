<?php
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            include('conexion.php');
            $nombre = $_POST['nombre'];
            $nombre = ucfirst($nombre);
            $sql = "SELECT nombre FROM consultorios WHERE nombre = ? AND vigente = 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows == 0)
            {
                $stmt->close();
                $sql = "INSERT INTO `consultorios`(`nombre`, `vigente`) VALUES (?, 1)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $nombre);
                $stmt->execute();
                $_SESSION['mensaje'] = "El consultorio fue creado con éxito";
                header("location: ../paginas/consultorios/crearConsultorioVisual.php");
            }
            else
            {
                $_SESSION['mensaje'] = "El consultorio $nombre ya existía";
                header("location: ../paginas/consultorios/crearConsultorioVisual.php");
            }
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador";
            header("location: ../paginas/iniciarSesionVisual.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesión";
        header("location: ../paginas/iniciarSesionVisual.php");
    }
?>