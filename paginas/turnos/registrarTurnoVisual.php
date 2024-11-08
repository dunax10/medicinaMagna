<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/estiloBootstrap.css">
    <title>Registrar Medicos | Medicina Magna</title>
</head>
<body class="bg-fondoClaro">
    <header class="bg-secundario ">
        <?php include('header.php'); ?>
    </header>
    
    <main class="bg-fondoClaro flex-grow-1 d-flex justify-content-center align-items-center w-100 my-5">
        <div class="form-box my-4">
            <div class="card p-4 shadow-lg">
                <h2 class="p-3">Registrar Medico</h2>
                <div class="input-group mb-3">
                    <?php include('../../backend/registrarMedicoFormulario.php'); ?>
                </div>
            </div>
        </div>
    </main>
    
    <footer class="">
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>