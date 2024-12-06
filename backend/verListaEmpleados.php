<?php
    include('conexion.php');
    include('mensaje.php');
    
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
        $idUsuario = $_SESSION['idUsuario'];

        $sql = "SELECT * FROM empleados WHERE vigente = 1 ORDER BY nombre ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idEmpleado, $nombre, $mail, $contraseña, $administrador, $vigente);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
</head>
<body>
    <div class="container my-2">
        <h1 class="text-center my-2">Listado de Empleados</h1>
        <div class="row">
        <?php
            while ($stmt->fetch()) {
        ?>
            <div class="col-md-4">
                <div class="border rounded shadow p-3 my-2">
                    <strong>ID:</strong> <?= $idEmpleado ?> <br>
                    <strong>Nombre:</strong> <?= $nombre ?> <br>
                    <strong>Email:</strong> <?= $mail ?>
                    <?php if ($_SESSION['admin'] == true): ?>
                        <form action="modificarEmpleadosVisual.php" method="post" class="mt-2">
                            <input type="hidden" name="idEmpleado" value="<?= $idEmpleado ?>">
                            <input type="hidden" name="nombre" value="<?= $nombre ?>">
                            <input type="hidden" name="mail" value="<?= $mail ?>">
                            <button type="submit" class="btn btn-secondary">Modificar</button>
                        </form>
                        <form action="../../backend/darBajaEmpleado.php" method="post" class="mt-2">
                            <input type="hidden" name="idEmpleado" value="<?= $idEmpleado ?>">
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
