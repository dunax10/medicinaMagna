<?php
    include('conexion.php');
    include('mensaje.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idUsuario = $_SESSION['idUsuario'];

            $sql = "SELECT * FROM empleados WHERE vigente = 0 ORDER BY nombre ASC;";
            //preparo la conexion
            $stmt = $conn->prepare($sql);
            //ejecuto la consulta
            $stmt->execute();
            //almaceno el resultado para verificar
            $stmt->store_result();
            //traigo los resultados de la consulta y la recorro con un while
            $stmt->bind_result($idEmpleado, $nombre, $mail, $contraseña, $administrador, $vigente);
            while ($stmt->fetch()) 
            {
                $contraseña = null;
                $administrador = null;
                echo "<div class='border p-3 m-3'><form action='../../backend/restaurarEmpleado.php' method='post'>
                    <input type='hidden' name='idEmpleado' value='$idEmpleado'>
                    <input type='submit'class='btn btn-verde ' value='^'>
                </form>";
                echo "<p>ID: $idEmpleado </p><p> NOMBRE: $nombre </p><p> MAIL: $mail </p><br>";
                echo "</div>";
            }
            $stmt->close();
        }

    }
    else
    {
        $_SESSION['mensaje'] = "Necesitas iniciar sesion";
        header('location: ../iniciarSesionVisual.php');
    }
?>