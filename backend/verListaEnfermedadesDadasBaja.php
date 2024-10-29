<?php
    include('conexion.php');
    session_start();
    if(isset($_SESSION['idUsuario']))
    {
        $idUsuario = $_SESSION['idUsuario'];

        $sql = "SELECT * FROM enfermedades WHERE vigente = 0 ORDER BY nombre ASC;";
        //preparo la conexion
        $stmt = $conn->prepare($sql);
        //ejecuto la consulta
        $stmt->execute();
        //almaceno el resultado para verificar
        $stmt->store_result();
        //traigo los resultados de la consulta y la recorro con un while
        $stmt->bind_result($idEnfermedad, $nombre);
        while ($stmt->fetch()) 
        {
            if(isset($_SESSION['admin']))
            {
                if($_SESSION['admin'] == true)
                {
                        echo "<form action='restaurarEnfermedad.php' method='post'>
                            <input type='hidden' name='idEnfermedad' value='$idEnfermedad'>
                            <input type='submit' value='X'>
                        </form>";
                }
            }
            echo "id $idEnfermedad nombre $nombre<br>";
        }
        $stmt->close();

    }
    else
    {
        $_SESSION['mensaje'] = "Necesitas iniciar sesion";
        header('location: iniciarSesionFormulario.php');
    }
?>