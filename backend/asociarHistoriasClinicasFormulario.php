<?php
//INSERT INTO `historiales_clinicos`(`idPaciente`, `fecha`, `descripcionMalestar`) VALUES (
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            include('conexion.php');
            ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <form action="asociarHistoriasClinicas.php" method="post">
                    <label>Seleccione la historia clinica:</label>
                    <select name="idHistorial">
                        <?php 
                        // trae todo de categoria
                        $sql = "SELECT idHistorial, pacientes.nombre FROM historiales_clinicos INNER JOIN pacientes ON pacientes.idPaciente = historiales_clinicos.idPaciente";
                        //preparo la conexion
                        $stmt = $conn->prepare($sql);
                        //ejecuto la consulta
                        $stmt->execute();
                        //almaceno el resultado para verificar
                        $stmt->store_result();
                        //traigo los resultados de la consulta y la recorro con un while
                        $stmt->bind_result($idHistorial, $nombre);
                        while ($stmt->fetch()) {
                            echo "<option value = $idHistorial>$nombre $idHistorial</option>";
                        }
                        ?>
                    </select>

                    <label>Seleccione una enfermedad:</label>
                    <select name="idEnfermedad">
                        <?php 
                        // trae todo de categoria
                        $sql = "SELECT idEnfermedad, nombre FROM enfermedades";
                        //preparo la conexion
                        $stmt = $conn->prepare($sql);
                        //ejecuto la consulta
                        $stmt->execute();
                        //almaceno el resultado para verificar
                        $stmt->store_result();
                        //traigo los resultados de la consulta y la recorro con un while
                        $stmt->bind_result($idEnfermedad, $nombre);
                        while ($stmt->fetch()) {
                            echo "<option value = $idEnfermedad>$nombre</option>";
                        }
                        ?>
                    </select>

                    <label>Seleccione un medicamento:</label>
                    <select name="idMedicamento">
                        <?php 
                        // trae todo de categoria
                        $sql = "SELECT idMedicamento, nombre FROM medicamentos";
                        //preparo la conexion
                        $stmt = $conn->prepare($sql);
                        //ejecuto la consulta
                        $stmt->execute();
                        //almaceno el resultado para verificar
                        $stmt->store_result();
                        //traigo los resultados de la consulta y la recorro con un while
                        $stmt->bind_result($idMedicamento, $nombre);
                        while ($stmt->fetch()) {
                            echo "<option value = $idMedicamento>$nombre</option>";
                        }
                        ?>
                    </select>
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