<?php
    session_start();
    include('conexion.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idMedicamento = $_POST['idMedicamento'];
            $stmt = $conn->prepare("UPDATE `medicamentos` SET vigente = 1 WHERE idMedicamento = ? AND vigente = 0");
            // Verificar si la preparación fue exitosa
            if ($stmt === false) 
            {
                die('Error en la preparación: ' . $conn->error);
            }
            // Vincular parámetros
            $stmt->bind_param('s', $idMedicamento);
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

            $_SESSION['mensaje'] = "Medicamento restaurados exitosamente";
            header('Location: ../paginas/medicamentos/verListaMedicamentosDadosBajaVisual.php');
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