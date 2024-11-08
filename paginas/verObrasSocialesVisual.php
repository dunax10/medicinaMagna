<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Obras Sociales | Medicina Magna</title>
</head>
<body class="bg-fondoClaro">
    <header class="bg-secundario">
        <?php include('subheader.php'); ?>
    </header>
    
    <main class="bg-fondoClaro container py-5 my-5">
        <div class="row text-center justify-content-center my-3">
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow-lg pt-5" style="min-height: 350;">
                    <div class="card-body pt-5">
                        <h4 class="card-title">Registrar Obra Social</h4>
                        <p class="card-text">Añade una nueva obra social a la base de datos.</p>
                        <a href="ObrasSociales/registrarObraSocialVisual.php" class="btn btn-primary">Ir al Registro</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow-lg pt-5" style="min-height: 300px;">
                    <div class="card-body pt-5">
                        <h4 class="card-title">Listado de Obras Sociales</h4>
                        <p class="card-text">Consulta el listado de obras sociales registradas.</p>
                        <a href="ObrasSociales/verListaObraSocialesVisual.php" class="btn btn-primary">Ver Listado</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow-lg pt-5" style="min-height: 300px;">
                    <div class="card-body pt-5">
                        <h4 class="card-title">Listado de Obras Sociales dados de baja</h4>
                        <p class="card-text">Consulta el listado de obras sociales eliminadas.</p>
                        <a href="ObrasSociales/verListaObraSocialesDadosBajaVisual.php" class="btn btn-primary">Ver listado</a>
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
