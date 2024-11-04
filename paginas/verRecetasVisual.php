<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Recetas | Medicina Magna</title>
</head>
<body>
    <header class="bg-secundario ">
        <?php include('header.php'); ?>
    </header>
    
    <main class="bg-fondoClaro container">
        <?php include('../backend/verRecetas.php'); ?>
    </main>
    
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>