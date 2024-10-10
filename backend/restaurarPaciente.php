<?php
    session_start();
    include('conexion.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idPaciente = $_POST['idPaciente'];
            $stmt = $conn->prepare("UPDATE `pacientes` SET vigente = 1 WHERE idPaciente = ? AND vigente = 0");
            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }
            // Vincular parámetros
            $stmt->bind_param('s', $idPaciente);
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
            
            $_SESSION['mensaje'] = "Paciente restaurado exitosamente";
            header('Location: verListaEmpleadosDadosBaja.php');
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador";
            header('Location: iniciarSesionFormulario.php');
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesión";
        header('Location: iniciarSesionFormulario.php');
    }
?>