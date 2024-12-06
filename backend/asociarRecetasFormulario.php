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
                <form action="../../backend/asociarRecetas.php" method="post">
                    <label class="m-1">Seleccione un paciente:</label>
                    <select id='BuscarPacientes' class="form-select my-1 p-1" style='width: 200px;' lang="es" name="idPaciente" required>
                        <option selected>Elegir paciente</option>
                        <option value='0'>- Buscar pacientes -</option>
                    </select><br>

                    <label class="m-1">Cantidad del medicamento:</label>
                    <input type="number"  class="form-control my-1 p-1"name="cantidadMedicamento" placeholder="Ingrese la cantidad" required><br>

                    <label>Periodo del medicamento:</label>
                    <input type="text" class="form-control my-1 p-1" name="periodoMedicamento" placeholder="Ingrese el periodo (ej: 8hs)" required><br>

                    <label class="m-1">Seleccione una enfermedad:</label>
                    <select id='BuscarEnfermedades' class="form-select my-1 p-1" style='width: 200px;' lang="es" name="idEnfermedad">
                    <option selected>Elegir enfermedad</option>
                        <option value='0'>- Buscar enfermedades -</option>
                    </select><br>

                    <label class="m-1">Seleccione un medicamento:</label>
                    <select id='BuscarMedicamentos' class="form-select my-1 p-1" style='width: 200px;' lang="es" name="idMedicamento" required>
                    <option selected>Elegir medicamento</option>
                        <option value='0'>- Buscar medicamentos -</option>
                    </select><br>
                    <div class="d-flex justify-content-center mt-4">
                        <input type="submit" class="btn btn-primary"name="enviar" value="Enviar">
                    </div>
                </form>
            </body>
            </html>
            <script src="../../backend/select2.js"></script>
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
            header("location: ../iniciarSesionVisual.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: ../iniciarSesionVisual.php");
    }
?>