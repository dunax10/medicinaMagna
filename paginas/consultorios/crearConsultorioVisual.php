<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/estiloBootstrap.css">
    <title>Crear Consultorios | Medicina Magna</title>
</head>
<body class="bg-fondoClaro">
    <header class="bg-secundario ">
        <?php include('header.php'); ?>
    </header>
    
    <main class="bg-fondoClaro flex-grow-1 d-flex justify-content-center align-items-center w-100 py-5 my-5">
        <div class="form-box p-3 my-4">
            <div class="card p-5 shadow-lg">
                <h2 class="p-3">Crear Consultorio</h2>
                <div class="input-group mb-3">
                    <?php include('../../backend/crearConsultorioFormulario.php'); ?>
                </div>
            </div>
        </div>
    </main>
    
    <footer class="">
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>