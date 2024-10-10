<?php
    include('conexion.php');

    // Número de registros recuperados
    $numberofrecords = 10;

    if(!isset($_POST['searchTerm']) || empty($_POST['searchTerm'])) {
        // Obtener registros a través de la consulta SQL
        $stmt = $conn->prepare("SELECT idConsultorio, nombre FROM consultorios WHERE vigente = 1 ORDER BY nombre LIMIT ? ");
        $stmt->bind_param('i', $numberofrecords);
    } else {
        $search = '%' . $_POST['searchTerm'] . '%'; // Search text con comodines
        // Mostrar resultados
        $stmt = $conn->prepare("SELECT idConsultorio, nombre FROM consultorios WHERE nombre AND vigente = 1 LIKE ? ORDER BY nombre LIMIT ? ");
        $stmt->bind_param('si', $search, $numberofrecords);
    }

    $stmt->execute();

    // Vincular resultados a variables
    $stmt->bind_result($idConsultorio, $nombre);

    $response = array();

    // Leer los datos de MySQL
    while ($stmt->fetch()) {
        $response[] = array(
            "id" => $idConsultorio,
            "text" => $nombre
        );
    }

    // Cerrar la declaración
    $stmt->close();

    // Devolver los datos como JSON
    echo json_encode($response);
    exit();
?>
