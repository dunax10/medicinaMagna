<?php
include('mensaje.php');
        include('conexion.php');
        ?>
        
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
            <!-- Select2 CSS y JS -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        </head>
        <body>
            <form action="../../backend/asociarConsulta.php" method="post">
                <label>Seleccione un medico:</label>
                <select id='BuscarMedicos' style='width: 200px;' lang="es" name="idMedico" required>
                    <option value='0'>- Buscar medicos -</option>
                </select><br>
                
                <label>Seleccione un paciente:</label>
                <select id='BuscarPacientes' style='width: 200px;' lang="es" name="idPaciente">
                    <option value='0'>- Buscar pacientes -</option>
                </select><br>

                <label>Fecha del turno</label>
                <input type="date" name="fecha" class="form-control"><br>

                <label>Hora del turno (formato de 24 horas hh:mm)</label>
                <input type="text" name="hora" placeholder="Ingrese la hora" class="form-control" required><br>
                <div class="d-flex justify-content-center mt-4">
                    <input type="submit" class="btn btn-terciario" name="enviar" value="Enviar">
                </div>
            </form>
        </body>
        </html>
        
        <script>
            $(document).ready(function() {

                // Inicializar Select2 para buscar médicos
                $("#BuscarMedicos").select2({
                    ajax: {
                        url: "../../backend/BuscarMedicos.php",
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

                // Validación en envío de formulario para "BuscarMedicos"
                $("form").submit(function(e) {
                    if ($("#BuscarMedicos").val() === null || $("#BuscarMedicos").val() === '0') {
                        alert("Por favor, selecciona un médico.");
                        e.preventDefault();  // Evita el envío del formulario si no se selecciona nada
                    }
                });

                // Inicializar Select2 para buscar pacientes
                $("#BuscarPacientes").select2({
                    ajax: {
                        url: "../../backend/BuscarPacientes.php",
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

                // Validación en envío de formulario para "BuscarPacientes"
                $("form").submit(function(e) {
                    if ($("#BuscarPacientes").val() === null || $("#BuscarPacientes").val() === '0') {
                        alert("Por favor, selecciona un paciente.");
                        e.preventDefault();  // Evita el envío del formulario si no se selecciona nada
                    }
                });
            });
        </script>
