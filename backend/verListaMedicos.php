<?php
    include('conexion.php');
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            $idUsuario = $_SESSION['idUsuario'];

            $sql = "SELECT * FROM medicos WHERE vigente = 1 ORDER BY nombre ASC;";
            //preparo la conexion
            $stmt = $conn->prepare($sql);
            //ejecuto la consulta
            $stmt->execute();
            //almaceno el resultado para verificar
            $stmt->store_result();
            //traigo los resultados de la consulta y la recorro con un while
            $stmt->bind_result($idMedico, $nombre, $apellido, $sexo, $dni, $fechaNacimiento, $fechaIngreso, $telefono, $domicilio, $disponibilidad, $idEmpleado, $vigente);
            while ($stmt->fetch()) 
            {
                if(isset($_SESSION['admin']))
                {
                    if($_SESSION['admin'] == true)
                    {
                            echo "<form action='darBajaMedico.php' method='post'>
                                <input type='hidden' name='idMedico' value='$idMedico'>
                                <input type='submit' value='X'>
                            </form>";
                    }
                }
                echo "ID: $idMedico NOMBRE: $nombre APELLIDO: $apellido DNI: $dni TELEFONO: $telefono DOMICILIO: $domicilio FECHA DE INGRESO: $fechaIngreso SEXO: $sexo FECHA DE NACIMIENTO: $fechaNacimiento<br>";
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