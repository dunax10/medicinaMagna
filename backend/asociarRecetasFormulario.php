<?php
//idPaciente	fecha	cantidadMedicamento	periodoMedicamentos	
    include('mensaje.php');
    if(isset($_SESSION['medico']))
    {
        if($_SESSION['medico'] == true)
        {
            include('conexion.php');
            ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- jQuery -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
                <title>Document</title>
            </head>
            <body>
                <form action="asociarRecetas.php" method="post">
                    <label>Seleccione un paciente:</label>
                    <select id='BuscarPacientes' style='width: 200px;' lang="es" name="idPaciente" required>
                        <option value='0'>- Buscar pacientes -</option>
                    </select><br>

                    <label>Cantidad del medicamento:</label>
                    <input type="number" name="cantidadMedicamento" placeholder="Ingrese la cantidad" required><br>

                    <label>Periodo del medicamento:</label>
                    <input type="text" name="periodoMedicamento" placeholder="Ingrese el periodo (ej: 8hs)" required><br>

                    <label>Seleccione una enfermedad:</label>
                    <select id='BuscarEnfermedades' style='width: 200px;' lang="es" name="idEnfermedad">
                        <option value='0'>- Buscar enfermedades -</option>
                    </select><br>

                    <label>Seleccione un medicamento:</label>
                    <select id='BuscarMedicamentos' style='width: 200px;' lang="es" name="idMedicamento" required>
                        <option value='0'>- Buscar medicamentos -</option>
                    </select><br>

                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>
            <script src="select2.js"></script>
            <script>
                $(document).ready(function(){
                    $("form").submit(function(e) {
                        if ($("#BuscarMedicamentos").val() === null || $("#BuscarMedicamentos").val() === '0') {
                            alert("Por favor, selecciona un medicamento.");
                            e.preventDefault();  // Evita el envío del formulario si no se selecciona nada
                        }
                    });
                });
            </script>

            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser medico para crear historiales clinicos";
            header("location: iniciarSesionFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: iniciarSesionFormulario.php");
    }
?>