<?php
//INSERT INTO `historiales_clinicos`(`idPaciente`, `fecha`, `descripcionMalestar`) VALUES (
    include('mensaje.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
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
                <form action="asociarConsultorios.php" method="post">
                    <label>Seleccione un medico:</label>
                    <select id='BuscarMedicos' style='width: 200px;' lang="es" name="idMedico" required>
                        <option value='0'>- Buscar medicos -</option>
                    </select><br>

                    <label>Fecha donde se encuentra en el consultorio</label>
                    <select name="fecha" required>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sabado">Sábado</option>
                        <option value="Domingo">Domingo</option>
                    </select><br>

                    <label>Hora donde entra al consultorio (formato de 24 horas)</label>
                    <input type="text" name="horaIngreso" placeholder="Ingrese la hora" required><br>

                    <label>Hora donde se va del consultorio (formato de 24 horas)</label>
                    <input type="text" name="horaEgreso" placeholder="Ingrese la hora"><br>

                    <label>Seleccione un consultorio:</label>
                    <select id='BuscarConsultorios' style='width: 200px;' lang="es" name="idConsultorio">
                        <option value='0'>- Buscar consultorios -</option>
                    </select><br>

                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
            </html>
            <script>
                $(document).ready(function(){

                    $("#BuscarMedicos").select2({
                        ajax: {
                            url: "BuscarMedicos.php",
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
                        if ($("#BuscarMedicos").val() === null || $("#BuscarMedicos").val() === '0') {
                            alert("Por favor, selecciona un medico.");
                            e.preventDefault();  // Evita el envío del formulario si no se selecciona nada
                        }
                    });
                });

                $(document).ready(function(){

                    $("#BuscarConsultorios").select2({
                        ajax: {
                            url: "BuscarConsultorios.php",
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
                        if ($("#BuscarConsultorios").val() === null || $("#BuscarConsultorios").val() === '0') {
                            alert("Por favor, selecciona un consultorio.");
                            e.preventDefault();  // Evita el envío del formulario si no se selecciona nada
                        }
                    });
                });
            </script>
                
            <?php
        }
        else
        {
            $_SESSION['mensaje'] = "Debe ser admin para asociar consultorios";
            header("location: iniciarSesionFormulario.php");
        }
    }
    else
    {
        $_SESSION['mensaje'] = "Debe iniciar sesion";
        header("location: iniciarSesionFormulario.php");
    }
?>