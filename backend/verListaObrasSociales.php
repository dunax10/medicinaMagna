<?php
    include('conexion.php');
    include('mensaje.php');
    
    if(isset($_SESSION['admin'])) {
        if($_SESSION['admin'] == true) {
            $idUsuario = $_SESSION['idUsuario'];

            // Consulta para obtener las obras sociales vigentes
            $sql = "SELECT * FROM obras_sociales WHERE vigente = 1 ORDER BY nombre ASC;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($idObraSocial, $nombre, $telefono, $vigente);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Obras Sociales</title>
</head>
<body>
    <div class="container p-5 my-5">
        <?php
            while ($stmt->fetch()) {
        ?>
            <div class="obra-social">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>ID:</strong> <?= $idObraSocial ?> <br>
                        <strong>Nombre:</strong> <?= $nombre ?> <br>
                        <strong>Teléfono:</strong> <?= $telefono ?>
                    </div>
                    <form action="../../backend/modificarObraSocialFormulario.php" method="post">
                        <input type="hidden" name="idObraSocial" value="<?= $idObraSocial ?>">
                        <input type="hidden" name="nombre" value="<?= $nombre ?>">
                        <input type="hidden" name="telefono" value="<?= $telefono ?>">
                        <button type="submit" class="btn btn-delete">Modificar</button>
                    </form>
                    <form action="../../backend/darBajaObraSocial.php" method="post">
                        <input type="hidden" name="idObraSocial" value="<?= $idObraSocial ?>">
                        <button type="submit" class="btn btn-delete">Eliminar</button>
                    </form>
                </div>
            </div>
        <?php
            }
            $stmt->close();
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
        }
    } else {
        $_SESSION['mensaje'] = "Necesitas iniciar sesión";
        header('location: ../iniciarSesionVisual.php');
    }
?>
