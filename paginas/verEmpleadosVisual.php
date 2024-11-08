<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/estiloBootstrap.css">
    <title>Gestión de Empleado | Medicina Magna</title>
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
                        <h5 class="card-title">Registrar Empleado</h5>
                        <p class="card-text">Añade un nuevo Empleado a la base de datos.</p>
                        <a href="empleados/registrarEmpleadoVisual.php" class="btn btn-primary">Ir al Registro</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Listado de Empleado</h5>
                        <p class="card-text">Consulta el listado de Empleado registrados.</p>
                        <a href="empleados/verListaEmpleadosVisual.php" class="btn btn-primary">Ver Listado</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Restaurar Empleado</h5>
                        <p class="card-text">Restaura un Empleado previamente eliminado.</p>
                        <a href="empleados/restaurarEmpleadoVisual.php" class="btn btn-primary">Restaurar Empleado</a>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Modificar Empleado</h5>
                        <p class="card-text">Actualiza la información de un Empleado.</p>
                        <a href="empleados/modificarEmpleadoVisual.php" class="btn btn-primary">Modificar Empleado</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Dar de Baja Empleado</h5>
                        <p class="card-text">Elimina un Empleado del sistema.</p>
                        <a href="empleados/darBajaEmpleadosVisual.php" class="btn btn-primary">Dar de Baja</a>
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
