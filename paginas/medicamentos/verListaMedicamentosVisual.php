<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/estiloBootstrap.css">
    <title>Lista de Medicos | Medicina Magna</title>
</head>
<body class="bg-fondoClaro"></body>
    <header class="bg-secundario mb-3">
        <?php include('header.php'); ?>
    </header>
    
    <main class="bg-fondoClaro container p-3 my-5">
    <div class="form-box my-4">
            <div class="card p-4 shadow-lg">
                <div class="input-group mb-4">
                    <?php include('../../backend/verListaMedicamentos.php'); ?>
                </div>
            </div>
        </div>
    </main>
    
    <footer class="mt-4">
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>