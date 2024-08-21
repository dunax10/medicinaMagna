<?php
    session_start();
    if(isset($_SESSION['idUsuario']))
    {
        include('conexion.php');
        $nombre = $_POST['nombre'];
        $nombre = ucfirst($nombre);
        $sql = "SELECT nombre FROM medicamentos WHERE nombre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows == 0)
        {
            $stmt->close();
            $sql = "INSERT INTO `medicamentos`(`nombre`) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $_SESSION['mensaje'] = "El medicamento fue creado con éxito";
            header("location: crearMedicamentoFormulario.php");
        }
        else
        {
            $_SESSION['mensaje'] = "El medicamento $nombre ya existía";
            header("location: crearMedicamentoFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesión";
        header("location: iniciarSesionFormulario.php");
    }
?>