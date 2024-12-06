<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../scss/estiloBootstrap.css">
    <title>Modificar Empleados | Medicina Magna</title>
</head>
<body class="bg-fondoClaro"></body>
    <header class="bg-secundario ">
        <?php include('header.php'); ?>
    </header>
    
    <main class="bg-fondoClaro flex-grow-1 d-flex justify-content-center align-items-center w-100 my-5">
        <div class="form-box my-4 p-4">
            <div class="card p-4 shadow-lg">
            <h3 class="text-center my-2">Modificar Empleado</h3>
                <?php include('../../backend/modificarEmpleadosFormulario.php'); ?>
            </div>
        </div>
    </main>
    
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>