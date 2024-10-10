<?php
    session_start();
    include('conexion.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idEmpleado = $_POST['idEmpleado'];
            $stmt = $conn->prepare("UPDATE `empleados` SET vigente = 1 WHERE idEmpleado = ? AND vigente = 0");
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
            
            
            
            $sql = "SELECT idMedico FROM medicos WHERE idEmpleado = ?";
            $stmt = $conn->prepare($sql);
            if($stmt === false)
            {
                die("Error en la preparación: " . $conn->error);
            }
            $stmt->bind_param('s', $idEmpleado);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($idMedico);
            if($stmt->num_rows == 0)
            {
                $_SESSION['mensaje'] = "Empleado restaurado exitosamente";
                header('Location: verListaEmpleadosDadosBaja.php');
            }
            else
            {
                while ($stmt->fetch()) 
                {
                    $stmtMedicos = $conn->prepare("UPDATE `medicos` SET vigente = 1 WHERE idMedico = ? AND vigente = 0");
                    // Verificar si la preparación fue exitosa
                    if ($stmtMedicos === false) 
                    {
                        die('Error en la preparación: ' . $conn->error);
                    }
                    // Vincular parámetros
                    $stmtMedicos->bind_param('s', $idMedico);
                    // Ejecutar la consulta
                    $resultado = $stmtMedicos->execute();
                    // Verificar si la ejecución fue exitosa
                    if ($resultado === false) 
                    {
                        die('Error en la ejecución: ' . $stmtMedicos->error);
                    } 
                    else 
                    {
                        echo "Registro insertado exitosamente.";
                    }
                    $stmtMedicos->close();
                    
                }
                $stmt->close();
                $_SESSION['mensaje'] = "Medico restaurado exitosamente";
                header('Location: verListaEmpleadosDadosBaja.php');
            }
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