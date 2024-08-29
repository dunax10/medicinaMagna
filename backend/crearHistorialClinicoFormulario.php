<?php
//INSERT INTO `historiales_clinicos`(`idPaciente`, `fecha`, `descripcionMalestar`) VALUES (
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <form action="crearHistorialClinico.php" method="post">
                    <label>Seleccione un paciente:</label>
                    <select name="idPaciente">
                        <?php 
                        include('conexion.php');
                        // trae todo de categoria
                        $sql = "SELECT idPaciente, nombre FROM pacientes";
                        //preparo la conexion
                        $stmt = $conn->prepare($sql);
                        //ejecuto la consulta
                        $stmt->execute();
                        //almaceno el resultado para verificar
                        $stmt->store_result();
                        //traigo los resultados de la consulta y la recorro con un while
                        $stmt->bind_result($idPaciente, $nombre);
                        while ($stmt->fetch()) {
                            echo "<option value = $idPaciente>$nombre</option>";
                        }
                        ?>
                    </select>
                    <label>descripcion del malestar:</label>
                    <input type="text" name="descripcionMalestar" placeholder="Ingrese la descripcion" required><br>
                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser medico para crear historiales clinicos";
            header("location: iniciarSesionFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: iniciarSesionFormulario.php");
    }
?>