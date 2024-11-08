<?php
    include('conexion.php');
    include('mensaje.php');
    session_start();
    
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
        $idUsuario = $_SESSION['idUsuario'];

        $sql = "SELECT * FROM consultorios WHERE vigente = 0 ORDER BY nombre ASC;";
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
    <title>Lista de Empleados</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Empleados</h1>
        <div class="row">
        <?php
            while ($stmt->fetch()) {
        ?>
            <div class="col-md-4">
                <div class="employee-card">
                    <strong>ID:</strong> <?= $idConsultorio ?> <br>
                    <strong>Nombre:</strong> <?= $nombre ?> <br>
                    <?php if ($_SESSION['admin'] == true): ?>
                        <form action="../../backend/restaurarConsultorio.php" method="post" class="mt-2">
                            <input type="hidden" name="idConsultorio" value="<?= $idConsultorio ?>">
                            <button type="submit" class="btn btn-verde">Restaurar</button>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    } else {
        $_SESSION['mensaje'] = "Necesitas iniciar sesión";
        header('location: ../iniciarSesionVisual.php');
    }
?>
