<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Gestión de Paciente | Medicina Magna</title>
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
                        <h5 class="card-title">Registrar Paciente</h5>
                        <p class="card-text">Añade un nuevo Paciente a la base de datos.</p>
                        <a href="pacientes/registrarPacienteVisual.php" class="btn btn-primary">Ir al Registro</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Listado de Paciente</h5>
                        <p class="card-text">Consulta el listado de Paciente registrados.</p>
                        <a href="pacientes/verListaPacientesVisual.php" class="btn btn-primary">Ver Listado</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Buscar Paciente</h5>
                        <p class="card-text">Busca Paciente por nombre.</p>
                        <a href="pacientes/buscarPacientesVisual.php" class="btn btn-primary">Buscar Paciente</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Restaurar Paciente</h5>
                        <p class="card-text">Restaura un Paciente previamente eliminado.</p>
                        <a href="pacientes/restaurarPacienteVisual.php" class="btn btn-primary">Restaurar Paciente</a>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Modificar Paciente</h5>
                        <p class="card-text">Actualiza la información de un Paciente.</p>
                        <a href="pacientes/modificarPacienteVisual.php" class="btn btn-primary">Modificar Paciente</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Dar de Baja Paciente</h5>
                        <p class="card-text">Elimina un Paciente del sistema.</p>
                        <a href="pacientes/darBajaPacientesVisual.php" class="btn btn-primary">Dar de Baja</a>
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
