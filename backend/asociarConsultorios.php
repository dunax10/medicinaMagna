<?php
    session_start();
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {

            function esHoraValida($hora1, $hora2) 
            {
                $formato = 'H:i'; // Formato de 24 horas, por ejemplo, 23:59
            
                // Crear objetos DateTime para ambas horas
                $hora1_objeto = DateTime::createFromFormat($formato, $hora1);
                $erroresHora1 = DateTime::getLastErrors();

                $hora2_objeto = DateTime::createFromFormat($formato, $hora2);
                $erroresHora2 = DateTime::getLastErrors();
            
                // Verificar si la primera hora es válida
                if (!$hora1_objeto || $erroresHora1['warning_count'] > 0 || $erroresHora1['error_count'] > 0) 
                {
                    $_SESSION['mensaje'] = "Debe ingresar una hora válida de ingreso";
                    header("location: asociarConsultoriosFormulario.php");
                    exit();
                }
            
                // Verificar si la segunda hora es válida
                if (!$hora2_objeto || $erroresHora2['warning_count'] > 0 || $erroresHora2['error_count'] > 0) 
                {
                    $_SESSION['mensaje'] = "Debe ingresar una hora válida de egreso";
                    header("location: asociarConsultoriosFormulario.php");
                    exit();
                }
            
                // Comparar si la hora de ingreso es mayor o igual a la hora de egreso
                if ($hora1_objeto >= $hora2_objeto) 
                {
                    $_SESSION['mensaje'] = "La hora de ingreso no puede ser mayor o igual a la hora de egreso.";
                    header("location: asociarConsultoriosFormulario.php");
                    exit();
                }
            }
            

            include('conexion.php');
            $idConsultorio = $_POST['idConsultorio'];
            $fecha = $_POST['fecha'];
            $horaIngreso = $_POST['horaIngreso'];
            $horaEgreso = $_POST['horaEgreso'] ?? '23:59';

            esHoraValida($horaIngreso, $horaEgreso);

            $sql = "SELECT * FROM consultorios_medicos WHERE idConsultorio = ? AND fecha = ? AND ( (? BETWEEN horaIngreso AND horaEgreso) OR (? BETWEEN horaIngreso AND horaEgreso) OR (horaIngreso BETWEEN ? AND ?) OR (horaEgreso BETWEEN ? AND ?));";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssssss', $idConsultorio, $fecha, $horaIngreso, $horaEgreso, $horaIngreso, $horaEgreso, $horaIngreso, $horaEgreso);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows == 0)
            {
                $stmt->close();
                $idMedico = $_POST['idMedico'];

                $sql = "INSERT INTO `consultorios_medicos`(`idConsultorio`, `idMedico`, `fecha`, `horaIngreso`, `horaEgreso`) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sssss', $idConsultorio, $idMedico, $fecha, $horaIngreso, $horaEgreso);
                $stmt->execute();
                $_SESSION['mensaje'] = "El consultorio fue asociado con éxito";
                header("location: asociarConsultoriosFormulario.php");
                exit();
            }
            else
            {
                $_SESSION['mensaje'] = "El consultorio estaba ocupado en la fecha y hora del $fecha entre las $horaIngreso y las $horaEgreso";
                header("location: asociarConsultoriosFormulario.php");
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