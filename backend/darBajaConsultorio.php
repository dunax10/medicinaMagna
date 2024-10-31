<?php
    session_start();
    include('conexion.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idConsultorio = $_POST['idConsultorio'];
            $stmt = $conn->prepare("UPDATE `consultorios` SET vigente = 0 WHERE idConsultorio = ? AND vigente = 1");
            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }
            // Vincular parámetros
            $stmt->bind_param('s', $idConsultorio);
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

            $_SESSION['mensaje'] = "consultorio eliminada exitosamente";
            header('Location: verListaConsultorios.php');
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