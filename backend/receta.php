<?php
    $idReceta = $_POST['idReceta'];
    $nombrePaciente = $_POST['nombrePaciente'];
    $nombreMedicamento = $_POST['nombreMedicamento'];
    $nombreEnfermedad = $_POST['nombreEnfermedad'];
    $fecha = $_POST['fecha'];
    $cantidadMedicamento = $_POST['cantidad'];
    $periodoMedicamento = $_POST['periodo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta</title>
</head>
<body>
    <div>
        <label>Id de la receta: </label><?= $idReceta ?><br>
        <label>Nombre del paciente: </label><?= $nombrePaciente ?><br>
        <label>Nombre del medicamento: </label><?= $nombreMedicamento ?><br>
        <label>Nombre de la enfermedad: </label><?= $nombreEnfermedad ?><br>
        <label>Fecha de la receta: </label><?= $fecha ?><br>
        <label>Dosis: </label><?= $cantidadMedicamento ?><br>
        <label>Frecuencia: </label><?= $periodoMedicamento ?><br><br>
        <label>Firma: </label><br><br><br>
        <label>____________________ </label>
    </div>
</body>
</html>