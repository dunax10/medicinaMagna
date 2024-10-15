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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .obra-social {
            padding: 1rem;
            background-color: #f8f9fa;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Administrar Obras Sociales</h1>
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
                    <form action="darBajaObraSocial.php" method="post">
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
        header('location: iniciarSesionFormulario.php');
    }
?>
