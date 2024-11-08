<?php
    include('conexion.php');
    include('mensaje.php');
    if(isset($_SESSION['admin']))
    {
        if($_SESSION['admin'] == true)
        {
            $idUsuario = $_SESSION['idUsuario'];

            $sql = "SELECT * FROM medicos WHERE vigente = 0 ORDER BY nombre ASC;";
            //preparo la conexion
            $stmt = $conn->prepare($sql);
            //ejecuto la consulta
            $stmt->execute();
            //almaceno el resultado para verificar
            $stmt->store_result();
            //traigo los resultados de la consulta y la recorro con un while
            $stmt->bind_result($idMedico, $nombre, $apellido, $sexo, $dni, $fechaNacimiento, $fechaIngreso, $telefono, $domicilio, $disponibilidad, $idEmpleado, $vigente);
            ?>
            <div class="container my-3">
            <div class="row">
                <?php
                while ($stmt->fetch()) {
                    echo '
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm p-3 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="mb-1"><strong>ID Médico:</strong> ' . $idMedico . '</p>
                                    <p class="mb-1"><strong>Nombre:</strong> ' . $nombre . ' ' . $apellido . '</p>
                                    <p class="mb-1"><strong>DNI:</strong> ' . $dni . '</p>
                                    <p class="mb-1"><strong>Teléfono:</strong> ' . $telefono . '</p>
                                    <p class="mb-1"><strong>Domicilio:</strong> ' . $domicilio . '</p>
                                    <p class="mb-1"><strong>Fecha de Ingreso:</strong> ' . $fechaIngreso . '</p>
                                    <p class="mb-1"><strong>Sexo:</strong> ' . ($sexo == "M" ? "Masculino" : "Femenino") . '</p>
                                    <p class="mb-1"><strong>Fecha de Nacimiento:</strong> ' . $fechaNacimiento . '</p>
                                </div>
                                <form action="../../backend/restaurarMedico.php" method="post" class="m-0">
                                    <input type="hidden" name="idMedico" value="' . $idMedico . '">
                                    <input type="hidden" name="idEmpleado" value="' . $idEmpleado . '">
                                    <button type="submit" class="btn btn-verde btn-sm" title="Restaurar">^</button>
                                </form>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
        <?php
            $stmt->close();

            
        }

    }
    else
    {
        $_SESSION['mensaje'] = "Necesitas iniciar sesion";
        header('location: ../paginas/iniciarSesionVisual.php');
    }
?>