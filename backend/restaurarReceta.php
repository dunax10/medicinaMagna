<?php
    session_start();
    include('conexion.php');
    /*
        if(!isset($_SESSION['admin']))
        {
            $_SESSION['mensaje'] = "Debe iniciar sesión";
            header('Location: iniciarSesionFormulario.php');
        }
    */
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idReceta = $_POST['idReceta'];
            $stmt = $conn->prepare("UPDATE `recetas` SET vigente = 1 WHERE idMedicamento = ? AND vigente = 0");
            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }
            // Vincular parámetros
            $stmt->bind_param('s', $idReceta);
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

            $_SESSION['mensaje'] = "Receta restaurada exitosamente";
            header('Location: ../paginas/pacientes/verListaRecetasVisual.php');
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador";
            header('Location: ../paginas/iniciarSesionVisual.php');
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesión";
        header('Location: ../paginas/iniciarSesionVisual.php');
    }
?>