<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Consultorios | Medicina Magna</title>
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
                        <h4 class="card-title">Crear Consultorio</h4>
                        <p class="card-text">Añade un nuevo Consultorio al sistema.</p>
                        <a href="consultorios/CrearConsultorioVisual.php" class="btn btn-primary">Crear</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow-lg pt-5" style="min-height: 300px;">
                    <div class="card-body pt-5">
                        <h4 class="card-title">Listado de Consultorios</h4>
                        <p class="card-text">Consulta el listado de Consultorios registradas.</p>
                        <a href="consultorios/verListaConsultoriosVisual.php" class="btn btn-primary">Ver Listado</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow-lg pt-5" style="min-height: 300px;">
                    <div class="card-body pt-5">
                        <h4 class="card-title">Listado de Consultorios dados de baja</h4>
                        <p class="card-text">Consulta el listado de Consultorios eliminados.</p>
                        <a href="consultorios/verListaConsultoriosDadosBajaVisual.php" class="btn btn-primary">Ver listado</a>
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
