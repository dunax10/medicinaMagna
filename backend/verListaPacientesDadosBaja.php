<?php
    include('conexion.php');
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            $idUsuario = $_SESSION['idUsuario'];

            $sql = "SELECT * FROM pacientes WHERE vigente = 0 ORDER BY nombre ASC;";
            //preparo la conexion
            $stmt = $conn->prepare($sql);
            //ejecuto la consulta
            $stmt->execute();
            //almaceno el resultado para verificar
            $stmt->store_result();
            //traigo los resultados de la consulta y la recorro con un while
            $stmt->bind_result($idPaciente, $nombre, $apellido, $dni, $telefono, $domicilio, $tipoSangre, $sexo, $fechaNacimiento, $mail, $vigente);
            while ($stmt->fetch()) 
            {
                if(isset($_SESSION['admin']))
                {
                    if($_SESSION['admin'] == true)
                    {
                            echo "<form action='restaurarPaciente.php' method='post'>
                                <input type='hidden' name='idPaciente' value='$idPaciente'>
                                <input type='submit' value='X'>
                            </form>";
                    }
                }
                echo "ID: $idPaciente NOMBRE: $nombre APELLIDO: $apellido DNI: $dni TELEFONO: $telefono DOMICILIO: $domicilio TIPO DE SANGRE: $tipoSangre SEXO: $sexo FECHA DE NACIMIENTO: $fechaNacimiento MAIL: $mail <a href='verHistorialClinico.php?idPaciente=$idPaciente'>HISTORIAL CLINICO</a>  <a href='verRecetas.php?idPaciente=$idPaciente'>RECETAS</a><br>";
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