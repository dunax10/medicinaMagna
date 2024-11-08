<?php
    include('mensaje.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
            <form action="../../backend/registrarMedico.php" method="post" class="container">
    <div class="row">
        <div class="col-md-6">
            <label>Nombre:</label>
            <input type="text" class="form-control mb-3" name="nombre" placeholder="Ingrese el nombre" required>

            <label>Apellido:</label>
            <input type="text" class="form-control mb-3" name="apellido" placeholder="Ingrese el apellido" required>

            <label>Sexo:</label>
            <select name="sexo" class="form-control mb-3" required>
                <option value="F">Mujer</option>
                <option value="M">Hombre</option>
            </select>

            <label>Fecha de ingreso:</label>
            <input type="date" class="form-control mb-3" name="fechaIngreso" required>
        </div>

        <div class="col-md-6">
            <label>DNI:</label>
            <input type="number" class="form-control mb-3" name="dni" placeholder="Ingrese el DNI" required>

            <label>Teléfono:</label>
            <input type="text" class="form-control mb-3" name="telefono" placeholder="Ingrese el teléfono">

            <label>Domicilio:</label>
            <input type="text" class="form-control mb-3" name="domicilio" placeholder="Ingrese el domicilio">

            <label>Fecha de Nacimiento:</label>
            <input type="date" class="form-control mb-3" name="fechaNacimiento" required>

            <label>Email:</label>
            <input type="email" class="form-control mb-3" name="email" placeholder="Ingrese el email" required>
        </div>
    </div>
    
    <div class="text-center ">
        <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
    </div>
</form>

            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador para registrar empleados";
            header("location: ../iniciarSesionVisual.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: ../iniciarSesionVisual.php");
    }
?>