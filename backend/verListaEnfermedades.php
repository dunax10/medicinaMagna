<?php
    include('conexion.php');
    include('mensaje.php');
    
    if(isset($_SESSION['idUsuario'])) {
        $idUsuario = $_SESSION['idUsuario'];

        // Consulta para obtener las enfermedades vigentes
        $sql = "SELECT * FROM enfermedades WHERE vigente = 1 ORDER BY nombre ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idEnfermedad, $nombre, $vigente);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Enfermedades</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Enfermedades</h1>
        <div class="row">
        <?php
            while ($stmt->fetch()) {
        ?>
            <div class="col-md-4">
                <div class="enfermedad-card">
                    <strong>ID:</strong> <?= $idEnfermedad ?> <br>
                    <strong>Nombre:</strong> <?= $nombre ?>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                        <form action="../../backend/modificarEnfermedadesFormulario.php" method="post" class="mt-2">
                            <input type="hidden" name="idEnfermedad" value="<?= $idEnfermedad ?>">
                            <input type="hidden" name="nombre" value="<?= $nombre ?>">
                            <button type="submit" class="btn btn-terciario">Modificar</button>
                        </form>
                        <form action="../../backend/darBajaEnfermedad.php" method="post" class="mt-2">
                            <input type="hidden" name="idEnfermedad" value="<?= $idEnfermedad ?>">
                            <button type="submit" class="btn btn-rojo">Eliminar</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php
            }
            $stmt->close();
        ?>
        </div>
    </div>
</body>
</html>

<?php
    } else {
        $_SESSION['mensaje'] = "Necesitas iniciar sesión";
        header('location: ../../iniciarSesionVisual.php');
    }
?>
