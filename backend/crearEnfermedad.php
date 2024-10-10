<?php
    session_start();
    if(isset($_SESSION['idUsuario']))
    {
        include('conexion.php');
        $nombre = $_POST['nombre'];
        $nombre = ucfirst($nombre);
        $sql = "SELECT nombre FROM enfermedades WHERE nombre = ? AND vigente = 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows == 0)
        {
            $stmt->close();
            $sql = "INSERT INTO `enfermedades`(`nombre`, `vigente`) VALUES (?,1)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $_SESSION['mensaje'] = "La enfermedad fue creada con éxito";
            header("location: crearEnfermedadFormulario.php");
        }
        else
        {
            $_SESSION['mensaje'] = "La enfermedad $nombre ya existía";
            header("location: crearEnfermedadFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesión";
        header("location: iniciarSesionFormulario.php");
    }
?>