<?php
require ("../conexion.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$consulta = "SELECT * FROM multa WHERE estatus = 1";
$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Multa.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Titulo Libro', 'Estado Pago', 'Monto', 'Fecha Limite', 'Nombre Bibliotecario'));

foreach ($datos as $row) {
    fputcsv($output, array(
        $row['tituloLibro'],
        $row['estadoPago'],
        $row['monto'],
        $row['fechaLimite'],
        $row['nombreBibliotecario'],
    ));
}

fclose($output);
exit;
?>
