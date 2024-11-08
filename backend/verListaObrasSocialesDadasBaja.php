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
            while ($stmt->fetch()) {
                echo '
                <div class="container my-2">
                    <div class="card border-0 shadow-sm p-3 d-flex flex-row align-items-center justify-content-between">
                        <div>
                            <p class="mb-1"><strong>ID:</strong> ' . $idObraSocial . '</p>
                            <p class="mb-1"><strong>Nombre:</strong> ' . $nombre . '</p>
                            <p class="mb-1"><strong>Teléfono:</strong> ' . $telefono . '</p>
                        </div>
                        <form action="../../backend/restaurarObraSocial.php" method="post" class="m-0">
                            <input type="hidden" name="idObraSocial" value="' . $idObraSocial . '">
                            <button type="submit" class="btn btn-verde btn-sm" title="Restaurar">^</button>
                        </form>
                    </div>
                </div>';
            }
            
            $stmt->close();
        }

    }
    else
    {
        $_SESSION['mensaje'] = "Necesitas iniciar sesion";
        header('location: ../paginas/iniciarSesionVisual.php');
    }
?>