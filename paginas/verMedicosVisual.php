<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Gestión de Médicos | Medicina Magna</title>
</head>
<body class="bg-fondoClaro">
    <header class="bg-secundario">
        <?php include('subheader.php'); ?>
    </header>
    
    <main class="bg-fondoClaro container py-5 my-5">
        <div class="row text-center my-3">
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Registrar Médico</h5>
                        <p class="card-text">Añade un nuevo médico a la base de datos.</p>
                        <a href="medicos/registrarMedicoVisual.php" class="btn btn-primary">Ir al Registro</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Listado de Médicos</h5>
                        <p class="card-text">Consulta el listado de médicos registrados.</p>
                        <a href="medicos/verListaMedicoVisual.php" class="btn btn-primary">Ver Listado</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Restaurar Médico</h5>
                        <p class="card-text">Restaura un médico previamente eliminado.</p>
                        <a href="medicos/restaurarMedicoVisual.php" class="btn btn-primary">Restaurar Médico</a>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Modificar Médico</h5>
                        <p class="card-text">Actualiza la información de un médico.</p>
                        <a href="medicos/modificarMedicoVisual.php" class="btn btn-primary">Modificar Médico</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Dar de Baja Médico</h5>
                        <p class="card-text">Elimina un médico del sistema.</p>
                        <a href="darBajaMedico.php" class="btn btn-primary">Dar de Baja</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <footer class="mt-4">
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>
