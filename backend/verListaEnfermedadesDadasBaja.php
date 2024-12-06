<?php
    include('conexion.php');
    if(!isset($_SESSION['idUsuario']))
    {
        $_SESSION['mensaje'] = "Necesitas iniciar sesion";
        header('location: ../iniciarSesionVisual.php');
    }
        $idUsuario = $_SESSION['idUsuario'];
        $sql = "SELECT * FROM enfermedades WHERE vigente = 0 ORDER BY nombre ASC;";
        //preparo la conexion
        $stmt = $conn->prepare($sql);
        //ejecuto la consulta
        $stmt->execute();
        //almaceno el resultado para verificar
        $stmt->store_result();
        //traigo los resultados de la consulta y la recorro con un while
        $stmt->bind_result($idEnfermedad, $nombre, $vigente);
        echo "<div class='container my-5'>";
        echo "<div class='row'>";
        while ($stmt->fetch()) : ?>
                <div class="col-md-4 mb-4">
                    <div class="border rounded p-3 shadow">
                        <!-- Mostrar información de la enfermedad -->
                        <strong>id <?= $idEnfermedad ?>: <?= $nombre ?></strong><br>
                        
                        <!-- Botón para restaurar (si es admin) -->
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                            <form action='../../backend/restaurarEnfermedad.php' method='post' class='mt-2'>
                                <input type='hidden' name='idEnfermedad' value='<?= $idEnfermedad ?>'>
                                <button type='submit' class='btn btn-verde'>Restaurar</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; 
        echo "</div>";
    echo"</div>";
        $stmt->close();
?>