<?php
    session_start();
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {

            function esHoraValida($hora) 
            {
                $formato = 'H:i'; // Formato de 24 horas, por ejemplo, 23:59
            
                // Crear objetos DateTime para ambas horas
                $hora_objeto = DateTime::createFromFormat($formato, $hora);
                $erroresHora = DateTime::getLastErrors();
            
                // Verificar si la primera hora es válida
                if (!$hora_objeto || $erroresHora['warning_count'] > 0 || $erroresHora['error_count'] > 0) 
                {
                    $_SESSION['mensaje'] = "Debe ingresar una hora válida de ingreso";
                    header("location: asociarConsultaFormulario.php");
                    exit();
                }
            }
            

            include('conexion.php');
            $idPaciente = $_POST['idPaciente'];
            $idMedico = $_POST['idMedico'];
            $fecha = $_POST['fecha'];

            $hora = $_POST['hora'];

            esHoraValida($hora);

            $sql = "SELECT * FROM consultas WHERE idPaciente = ? AND fecha = ? AND hora = ? AND idMedico = ?;";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssss', $idPaciente, $fecha, $hora, $idMedico);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows == 0)
            {
                $stmt->close();
                $idMedico = $_POST['idMedico'];

                $sql = "INSERT INTO `consultas`(`idMedico`, `fecha`, `idPaciente`, `hora`) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssss', $idMedico, $fecha, $idPaciente, $hora);
                $stmt->execute();
                $_SESSION['mensaje'] = "El consultorio fue asociado con éxito";
                header("location: asociarConsultaFormulario.php");
                exit();
            }
            else
            {
                $_SESSION['mensaje'] = "El consultorio estaba ocupado en la fecha y hora del $fecha a las $hora";
                header("location: asociarConsultaFormulario.php");
                exit();
            }
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador";
            header("location: iniciarSesionFormulario.php");
            exit();
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesión";
        header("location: iniciarSesionFormulario.php");
        exit();
    }
?>