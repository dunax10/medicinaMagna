<?php
//INSERT INTO `historiales_clinicos`(`idPaciente`, `fecha`, `descripcionMalestar`) VALUES (
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
                <form action="asociarObrasSocialesPacientes.php" method="post">
                    <label>Seleccione un paciente:</label>
                    <select id='BuscarPacientes' style='width: 200px;' lang="es" name="idPaciente" required>
                        <option value='0'>- Buscar pacientes -</option>
                    </select><br>

                    <label>Numero de obra social del paciente:</label>
                    <input type="number" name="numeroObraSocial" placeholder="Ingrese el numero" required><br>

                    <label>Seleccione una obra social:</label>
                    <select id='BuscarObrasSociales' style='width: 200px;' lang="es" name="idObraSocial">
                        <option value='0'>- Buscar obras sociales -</option>
                    </select><br>

                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>
            <script>
                $(document).ready(function(){

                    $("#BuscarPacientes").select2({
                        ajax: {
                            url: "BuscarPacientes.php",
                            type: "post",
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                return {
                                    searchTerm: params.term // search term
                                };
                            },
                            processResults: function (response) {
                                return {
                                    results: response,
                                };
                            },
                            cache: true
                        }
                    });
                    $("form").submit(function(e) {
                        if ($("#BuscarPacientes").val() === null || $("#BuscarPacientes").val() === '0') {
                            alert("Por favor, selecciona un paciente.");
                            e.preventDefault();  // Evita el envío del formulario si no se selecciona nada
                        }
                    });
                });

                $(document).ready(function(){

                    $("#BuscarObrasSociales").select2({
                        ajax: {
                            url: "BuscarObrasSociales.php",
                            type: "post",
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                return {
                                    searchTerm: params.term // search term
                                };
                            },
                            processResults: function (response) {
                                return {
                                    results: response,
                                };
                            },
                            cache: true
                        }
                    });
                    $("form").submit(function(e) {
                        if ($("#BuscarObrasSociales").val() === null || $("#BuscarObrasSociales").val() === '0') {
                            alert("Por favor, selecciona una obra social.");
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