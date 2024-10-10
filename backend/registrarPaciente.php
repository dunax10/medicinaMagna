<?php
    include('conexion.php');
    session_start();
    $email = $_POST['email'];
    
    // Verificar si el email ya existe en la base de datos
    $sql = "SELECT mail FROM pacientes WHERE mail = ? AND vigente = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if(($stmt->num_rows == 0))
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $sexo = $_POST['sexo'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $telefono = $_POST['telefono'];
        $domicilio = $_POST['domicilio'];
        $tipoSangre = $_POST['tipoSangre'];

        // Preparar la consulta
        $stmt = $conn->prepare("INSERT INTO `pacientes`(`nombre`, `apellido`, `dni`, `telefono`, `domicilio`, `tipoSangre`, `sexo`, `fechaNacimiento`, `mail`, `vigente`) VALUES (?,?,?,?,?,?,?,?,?,1)");

        // Verificar si la preparación fue exitosa
        if ($stmt === false) 
        {
            die('Error en la preparación: ' . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param('sssssssss', $nombre, $apellido, $dni, $telefono, $domicilio, $tipoSangre, $sexo, $fechaNacimiento, $email);

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

        $_SESSION['mensaje'] = "Paciente creado con éxito";
        header("location: registrarPacienteFormulario.php");
    }
    else
    {
        $_SESSION['mensaje'] = "El mail ya existe";
        header("location: registrarPacienteFormulario.php");
        $stmt->close();
    }
?>