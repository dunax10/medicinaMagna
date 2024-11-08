<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/estiloBootstrap.css">
    <title>Lista Medicos | Medicina Magna</title>
</head>
<body class="bg-fondoClaro"></body>
    <header class="bg-secundario mb-3">
        <?php include('header.php'); ?>
    </header>
    
    <main class="bg-fondoClaro container my-5">
        <div class="bg-white shadow-lg container p-5">
            <?php include('../../backend/verListaPacientes.php'); ?>
        </div>
    </main>
    
    <footer class="mt-4">
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>