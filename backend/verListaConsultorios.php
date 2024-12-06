<?php
    include('conexion.php');
    include('mensaje.php');
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
        $idUsuario = $_SESSION['idUsuario'];

        $sql = "SELECT * FROM consultorios WHERE vigente = 1 ORDER BY nombre ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idConsultorio, $nombre, $vigente);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Consultorios</h1>
        <div class="row">
        <?php
            while ($stmt->fetch()) {
        ?>
            <div class="col-md-4 border p-3 m-3">
                <div class="employee-card">
                    <strong>ID:</strong> <?= $idConsultorio ?> <br>
                    <strong>Nombre:</strong> <?= $nombre ?> <br>
                    <?php if ($_SESSION['admin'] == true): ?>
                        <form action="modificarConsultorioVisual.php" method="post" class="mt-2">
                            <input type="hidden" name="idConsultorio" value="<?= $idConsultorio ?>">
                            <input type="hidden" name="nombre" value="<?= $nombre ?>">
                            <button type="submit" class="btn btn-terciario">Modificar</button>
                        </form>
                        <form action="../../backend/darBajaConsultorio.php" method="post" class="mt-2">
                            <input type="hidden" name="idConsultorio" value="<?= $idConsultorio ?>">
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
        header('location: ../iniciarSesionVisual.php');
    }
?>
