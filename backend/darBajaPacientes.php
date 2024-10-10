<?php
    session_start();
    include('conexion.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idEmpleado = $_POST['idEmpleado'];
            $stmt = $conn->prepare("UPDATE `empleados` SET vigente = 0 WHERE idEmpleado = ? AND vigente = 1");
            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }
            // Vincular parámetros
            $stmt->bind_param('s', $idEmpleado);
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

            $_SESSION['mensaje'] = "Empleado eliminado exitosamente";
            header('Location: verListaEmpleados.php');
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