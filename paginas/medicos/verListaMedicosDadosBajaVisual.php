<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/estiloBootstrap.css">
    <title>Listado de Medicos dados de baja | Medicina Magna</title>
</head>
<body class="bg-fondoClaro"></body>
    <header class="bg-secundario ">
        <?php include('header.php'); ?>
    </header>

    <main class="bg-fondoClaro d-flex justify-content-center align-items-center my-3"> 
        <div class="form-box mt-4">
        <h2>Medicos dados baja</h2>
            <div class="card p-3 m-5 shadow-lg">
                <div class=" mb-3">
                    <?php include('../../backend/verListaMedicosDadosBaja.php'); ?>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>