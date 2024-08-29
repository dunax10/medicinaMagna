<?php
    include('conexion.php');
    session_start();
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            $idUsuario = $_SESSION['idUsuario'];

            $sql = "SELECT * FROM pacientes ORDER BY nombre ASC;";
            //preparo la conexion
            $stmt = $conn->prepare($sql);
            //ejecuto la consulta
            $stmt->execute();
            //almaceno el resultado para verificar
            $stmt->store_result();
            //traigo los resultados de la consulta y la recorro con un while
            $stmt->bind_result($idPaciente, $nombre, $apellido, $dni, $telefono, $domicilio, $tipoSangre, $sexo, $fechaNacimiento, $mail);
            while ($stmt->fetch()) 
            {
                echo "ID: $idPaciente NOMBRE: $nombre APELLIDO: $apellido DNI: $dni TELEFONO: $telefono DOMICILIO: $domicilio TIPO DE SANGRE: $tipoSangre SEXO: $sexo FECHA DE NACIMIENTO: $fechaNacimiento MAIL: $mail<br>";
            }
            $stmt->close();
        }

    }
    else
    {
        $_SESSION['mensaje'] = "Necesitas iniciar sesion";
        header('location: iniciarSesionFormulario.php');
    }
?>