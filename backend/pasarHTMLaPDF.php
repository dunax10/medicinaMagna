<?php
include_once ".././vendor/autoload.php";
ob_start();
include "receta.php";
$html = ob_get_clean();
$nombre = 'RecetaMedicinaMagna';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$contenido = $dompdf->output();
$nombreDelDocumento = $nombrePaciente;
$bytes = file_put_contents($nombreDelDocumento, $contenido);

header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();
?>