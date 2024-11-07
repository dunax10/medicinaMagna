<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/estiloBootstrap.css">
    <title>Dar Baja Medicos | Medicina Magna</title>
</head>
<body class="bg-fondoClaro"></body>>
    <header class="bg-secundario ">
        <?php include('header.php'); ?>
    </header>

    <main class="bg-fondoClaro flex-grow-1 d-flex justify-content-center align-items-center w-100">
        <div class="form-box mt-4">
            <div class="card p-4 shadow-lg">
                <h1>Dar baja Medico</h1>
                <div class="input-group mb-3">
                    <?php include('../../backend/registrarMedicoFormulario.php'); ?>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>