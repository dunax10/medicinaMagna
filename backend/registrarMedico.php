<?php
    include('conexion.php');
    session_start();
    $email = $_POST['email'];
    
    // Verificar si el email ya existe en la base de datos
    $sql = "SELECT mail FROM medicos WHERE mail = ?";
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
        $fechaIngreso = $_POST['fechaIngreso'];
        $telefono = $_POST['telefono'];
        $domicilio = $_POST['domicilio'];
        $contraseña = $_POST['contraseña'];

        $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
        // Preparar la consulta
        $stmt = $conn->prepare("INSERT INTO `medicos`(`nombre`, `apellido`, `dni`, `sexo`, `fechaNacimiento`, `fechaIngreso`, `telefono`, `domicilio`, `mail`, `disponibilidad`, `contraseña`) VALUES (?,?,?,?,?,?,?,?,?,1,?)");

        // Verificar si la preparación fue exitosa
        if ($stmt === false) 
        {
            die('Error en la preparación: ' . $conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param('ssssssssss', $nombre, $apellido, $dni, $sexo, $fechaNacimiento, $fechaIngreso, $telefono, $domicilio, $email, $contraseña);

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

        include('registrarEmpleado.php');

        $_SESSION['mensaje'] = "Usuario creado con éxito";
        header("location: iniciarSesionFormulario.php");
    }
    else
    {
        $_SESSION['mensaje'] = "El mail ya existe";
        header("location: iniciarSesionFormulario.php");
        $stmt->close();
    }
?>