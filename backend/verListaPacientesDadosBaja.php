<?php
    include('conexion.php');
    include('mensaje.php');
            $idUsuario = $_SESSION['idUsuario'];

            $sql = "SELECT * FROM pacientes WHERE vigente = 0 ORDER BY nombre ASC;";
            //preparo la conexion
            $stmt = $conn->prepare($sql);
            //ejecuto la consulta
            $stmt->execute();
            //almaceno el resultado para verificar
            $stmt->store_result();
            //traigo los resultados de la consulta y la recorro con un while
            $stmt->bind_result($idPaciente, $nombre, $apellido, $dni, $telefono, $domicilio, $tipoSangre, $sexo, $fechaNacimiento, $mail, $vigente);
            while ($stmt->fetch()) {
                echo '
                <div class="container my-3">
                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="mb-1"><strong>ID:</strong> ' . $idPaciente . '</p>
                                <p class="mb-1"><strong>Nombre:</strong> ' . $nombre . ' ' . $apellido . '</p>
                                <p class="mb-1"><strong>DNI:</strong> ' . $dni . '</p>
                                <p class="mb-1"><strong>Teléfono:</strong> ' . $telefono . '</p>
                                <p class="mb-1"><strong>Domicilio:</strong> ' . $domicilio . '</p>
                                <p class="mb-1"><strong>Tipo de Sangre:</strong> ' . $tipoSangre . '</p>
                                <p class="mb-1"><strong>Sexo:</strong> ' . ($sexo == "M" ? "Masculino" : "Femenino") . '</p>
                                <p class="mb-1"><strong>Fecha de Nacimiento:</strong> ' . $fechaNacimiento . '</p>
                                <p class="mb-1"><strong>Email:</strong> ' . $mail . '</p>
                            </div>';
            
                if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
                    echo '
                            <form action="../../backend/restaurarPaciente.php" method="post" class="m-0">
                                <input type="hidden" name="idPaciente" value="' . $idPaciente . '">
                                <button type="submit" class="btn btn-verde btn-sm" title="Restaurar">^</button>
                            </form>';
                }
            
                echo '
                        </div>
                        <div class="mt-3">
                            <a href="verHistorialClinico.php?idPaciente=' . $idPaciente . '" class="btn btn-link p-0">Historial Clínico</a> |
                            <a href="verRecetas.php?idPaciente=' . $idPaciente . '" class="btn btn-link p-0">Recetas</a>
                        </div>
                    </div>
                </div>';
            }
            
            $stmt->close();
?>