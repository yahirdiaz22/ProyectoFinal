<?php
require ("../conexion.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$consulta = "SELECT * FROM socio WHERE estatus = 1";
$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Socio.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Nombre', 'Apellido Paterno', 'Apellido Materno', 'Calle', 'Colonia', 'Cuidad', 'Estado', 'Telefono', 'Pais'));

foreach ($datos as $row) {
    fputcsv($output, array(
        $row['nombre'],
        $row['aPaterno'],
        $row['aMaterno'],
        $row['calle'],
        $row['colonia'],
        $row['cuidad'],
        $row['estado'],
        $row['telefono'],
        $row['pais'],
    ));
}

fclose($output);
exit;
?>
