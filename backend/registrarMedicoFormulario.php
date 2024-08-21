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
                <form action="registrarMedico.php" method="post">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" placeholder="Ingrese el nombre" required><br>
                    <label>Apellido:</label>
                    <input type="text" name="apellido" placeholder="Ingrese el apellido" required><br>
                    <label>Sexo:</label>
                    <select name="sexo" required>
                        <option value="F">Mujer</option>
                        <option value="M">Hombre</option>
                    </select><br>
                    <label>Fecha de ingreso:</label>
                    <input type="date" name="fechaIngreso" required><br>
                    <label>DNI:</label>
                    <input type="text" name="dni" placeholder="Ingrese el dni" required><br>
                    <label>Telefono:</label>
                    <input type="text" name="telefono" placeholder="Ingrese el telefono"><br>
                    <label>Domicilio:</label>
                    <input type="text" name="domicilio" placeholder="Ingrese el domilicio"><br>
                    <label>Fecha de Nacimiento:</label>
                    <input type="date" name="fechaNacimiento" required><br>
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Ingrese el email" required><br>
                    <label>Contraseña:</label>
                    <input type="hidden" name="contraseña" value="noCreada"><br>
                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser administrador para registrar empleados";
            header("location: iniciarSesionFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: iniciarSesionFormulario.php");
    }
?>