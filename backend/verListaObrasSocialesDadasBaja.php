<?php
    include('conexion.php');
    include('mensaje.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idUsuario = $_SESSION['idUsuario'];

            $sql = "SELECT * FROM obras_sociales WHERE vigente = 0 ORDER BY nombre ASC;";
            //preparo la conexion
            $stmt = $conn->prepare($sql);
            //ejecuto la consulta
            $stmt->execute();
            //almaceno el resultado para verificar
            $stmt->store_result();
            //traigo los resultados de la consulta y la recorro con un while
            $stmt->bind_result($idObraSocial, $nombre, $telefono, $vigente);
            while ($stmt->fetch()) 
            {
                echo "<form action='restaurarObraSocial.php' method='post'>
                    <input type='hidden' name='idObraSocial' value='$idObraSocial'>
                    <input type='submit' value='X'>
                </form>";
                echo "ID: $idObraSocial NOMBRE: $nombre TELEFONO: $telefono<br>";
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