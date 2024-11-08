<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Turnos | Medicina Magna</title>
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
                        <h4 class="card-title">Registrar Turno</h4>
                        <p class="card-text">Añade un nuevo Turno a la base de datos.</p>
                        <a href="turnos/registrarTurnoVisual.php" class="btn btn-primary">Ir al Registro</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow-lg pt-5" style="min-height: 300px;">
                    <div class="card-body pt-5">
                        <h4 class="card-title">Listado de Turnos</h4>
                        <p class="card-text">Consulta el listado de Turnos registradas.</p>
                        <a href="turnos/verListaTurnosVisual.php" class="btn btn-primary">Ver Listado</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>
