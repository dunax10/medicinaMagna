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
            $contador = 0; // Inicializar un contador para las columnas
            echo "<div class='container'>"; // Inicia el contenedor principal
            
            while ($stmt->fetch()) {
                $contraseña = null;
                $administrador = null;
            
                // Si el contador es 0 o par, inicia una nueva fila
                if ($contador % 2 == 0) {
                    echo "<div class='row'>"; // Inicia una nueva fila
                }
            
                // Agrega el contenido de la columna
                echo "<div class='col-md-6'>";
                echo "<div class='border p-3 m-3'>";
                echo "<p>ID: $idEmpleado </p><p>NOMBRE: $nombre </p><p>MAIL: $mail </p>";
                echo "<form action='../../backend/restaurarEmpleado.php' method='post'>
                    <input type='hidden' name='idEmpleado' value='$idEmpleado'>
                    <input type='submit' class='btn btn-verde' value='Restaurar'>
                </form>";

                echo "</div>"; // Cierra el contenedor con borde
                echo "</div>"; // Cierra la columna
            
                $contador++;
            
                // Si el contador es impar, cierra la fila
                if ($contador % 2 == 0)
                 {
                    echo "</div>"; // Cierra la fila
                }
            }
            
            // Si el último elemento no cerró la fila, ciérrala
            if ($contador % 2 != 0) {
                echo "</div>"; // Cierra la última fila incompleta
            }
            
            echo "</div>"; // Cierra el contenedor principal
            
            $stmt->close();


    }
    else
    {
        $_SESSION['mensaje'] = "Necesitas iniciar sesion";
        header('location: ../iniciarSesionVisual.php');
    }
}
?>