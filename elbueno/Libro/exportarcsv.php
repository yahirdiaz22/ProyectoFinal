<?php
require ("../conexion.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$consulta = "SELECT * FROM libro WHERE estatus = 1";
$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Libro.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Nombre', 'Editorial', 'Nombre Libro', 'Categoria Libro', 'Fecha Publicacion'));

foreach ($datos as $row) {
    fputcsv($output, array(
        $row['nombreAutor'],
        $row['editorial'],
        $row['nombreLibro'],
        $row['categoriaLibro'],
        $row['fechaPublicacion'],
    ));
}

fclose($output);
exit;
?>
