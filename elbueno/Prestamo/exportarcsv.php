<?php
require ("../conexion.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$consulta = "SELECT * FROM prestamo
INNER JOIN autor ON prestamo.idAutor = autor.idAutor
WHERE prestamo.estatus = 1";
$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Prestamo.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Nombre Autor', 'Titulo Libro', 'Fecha Prestamo', 'Fecha Devolucion', 'Categoria Libro', 'Nombre', 'Apellido Paterno', 'Apellido Materno', 'Calle', 'Colonia', 'Cuidad', 'Estado', 'Telefono', 'Pais'));

foreach ($datos as $row) {
    fputcsv($output, array(
        $row['nombreAutor'],
        $row['tituloLibro'],
        $row['fechaPrestamo'],
        $row['fechaDevolucion'],
        $row['categoriaLibro'],
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
