<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Pacientes | Medicina Magna</title>
</head>
<body class="bg-fondoClaro">
    <header class="bg-secundario mb-3">
        <?php include('subheader.php'); ?>
    </header>
    
    <main class="bg-fondoClaro container py-5 my-5">
        <div class="row text-center justify-content-center my-3">
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow-lg pt-5" style="min-height: 350;">
                    <div class="card-body pt-5">
                        <h4 class="card-title">Registrar Pacientes</h4>
                        <p class="card-text">Añade un nuevo Pacientes a la base de datos.</p>
                        <a href="pacientes/registrarPacienteVisual.php" class="btn btn-primary">Ir al Registro</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow-lg pt-5" style="min-height: 300px;">
                    <div class="card-body pt-5">
                        <h4 class="card-title">Listado de Pacientes</h4>
                        <p class="card-text">Consulta el listado de Pacientes registrados.</p>
                        <a href="pacientes/verListaPacientesVisual.php" class="btn btn-primary">Ver Listado</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow-lg pt-5" style="min-height: 300px;">
                    <div class="card-body pt-5">
                        <h4 class="card-title">Listado de Pacientes dados de baja</h4>
                        <p class="card-text">Consulta el listado de Pacientes eliminados.</p>
                        <a href="pacientes/verListaPacientesDadosBajaVisual.php" class="btn btn-primary">Ver listado</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <footer class="mt-5">
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>
