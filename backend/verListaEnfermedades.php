<?php
    include('conexion.php');
    session_start();
    
    if(isset($_SESSION['idUsuario'])) {
        $idUsuario = $_SESSION['idUsuario'];

        // Consulta para obtener las enfermedades vigentes
        $sql = "SELECT * FROM enfermedades WHERE vigente = 1 ORDER BY nombre ASC;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($idEnfermedad, $nombre);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Enfermedades</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .enfermedad-card {
            padding: 1rem;
            background-color: #f8f9fa;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.25rem 0.5rem;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
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
                        <form action="darBajaEnfermedad.php" method="post" class="mt-2">
                            <input type="hidden" name="idEnfermedad" value="<?= $idEnfermedad ?>">
                            <button type="submit" class="delete-btn">Eliminar</button>
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
        header('location: iniciarSesionFormulario.php');
    }
?>
