<?php
    include('conexion.php');
    include('mensaje.php');
        $idUsuario = $_SESSION['idUsuario'];

        $sql = "SELECT * FROM pacientes WHERE vigente = 1 ORDER BY nombre ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idPaciente, $nombre, $apellido, $dni, $telefono, $domicilio, $tipoSangre, $sexo, $fechaNacimiento, $mail, $vigente);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Pacientes</h1>
        <div class="row">
            <?php while ($stmt->fetch()) { ?>
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card p-3 h-100 shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title mb-2">ID: <?= $idPaciente ?></h6>
                            <p class="card-text mb-1"><strong>Nombre:</strong> <?= $nombre ?> <?= $apellido ?></p>
                            <p class="card-text mb-1"><strong>DNI:</strong> <?= $dni ?></p>
                            <p class="card-text mb-1"><strong>Tel:</strong> <?= $telefono ?></p>
                            <p class="card-text mb-1"><strong>Sangre:</strong> <?= $tipoSangre ?></p>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <a href="../historialesClinicos/verHistorialClinicoVisual.php?idPaciente=<?= $idPaciente ?>" class="btn btn-sm btn-outline-info">Historial</a>
                            <a href="../recetas/verListaRecetasVisual.php?idPaciente=<?= $idPaciente ?>" class="btn btn-sm btn-outline-primary">Recetas</a>
                        </div>
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                            <div class="d-flex justify-content-between mt-2">
                                <form action="../../backend/modificarPacienteFormulario.php" method="post">
                                    <input type="hidden" name="idPaciente" value="<?= $idPaciente ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-warning">Modificar</button>
                                </form>
                                <form action="../../backend/darBajaPacientes.php" method="post">
                                    <input type="hidden" name="idPaciente" value="<?= $idPaciente ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
            <?php $stmt->close(); ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
