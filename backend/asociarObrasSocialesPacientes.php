<?php
    include('conexion.php');
    session_start();
    $idObraSocial = $_POST['idObraSocial'];

    $sql = "SELECT idObraSocial FROM obras_sociales WHERE idObraSocial = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $idObraSocial);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows != 0)
    {
        $stmt->close();
        $idPaciente = $_POST['idPaciente'];
        $numeroObraSocial = $_POST['numeroObraSocial'];
        // Preparar la consulta
        $stmt = $conn->prepare("INSERT INTO `obras_sociales_pacientes`(`idObraSocial`, `idPaciente`, `numeroObraSocial`) VALUES (?, ?, ?)");

        // Verificar si la preparación fue exitosa
        if ($stmt === false) 
        {
            die('Error en la preparación: ' . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param('sss', $idObraSocial, $idPaciente, $numeroObraSocial);

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

        // Cerrar la declaración
        $stmt->close();

        $_SESSION['mensaje'] = "obra social vinculada con éxito";
        header("location: asociarObrasSocialesPacientesFormulario.php");
    }
    $stmt->close();
    $_SESSION['mensaje'] = "obra social no encontrada";
    header("location: asociarObrasSocialesPacientesFormulario.php");
?>