<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/estiloBootstrap.css">
    <title>Buscar Paciente | Medicina Magna</title>
</head>
<body class="bg-fondoClaro"></body>
    <header class="bg-secundario ">
        <?php include('header.php'); ?>
    </header>
    
    <main class="bg-fondoClaro container">
        <div>
            <?php include('../../backend/verListaPacientes.php'); ?>
        </div>
    </main>
    
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>