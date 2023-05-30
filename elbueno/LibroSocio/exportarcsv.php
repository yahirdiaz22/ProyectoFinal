<?php
require ("../conexion.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$consulta = "SELECT * FROM librosocio
INNER JOIN libro ON librosocio.idLibro = libro.idLibro
INNER JOIN socio ON librosocio.idSocio = socio.idSocio where librosocio.estatus = 1";
$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="LibroSocio.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Nombre Libro', 'Editorial', 'Nombre Libro', 'Categoria Libro', 'Fecha Publicacion','Nombre', 'Apellido Paterno', 'Apellido Materno', 'Calle', 'Colonia', 'Cuidad', 'Estado', 'Telefono', 'Pais'));

foreach ($datos as $row) {
    fputcsv($output, array(
        $row['nombreAutor'],
        $row['editorial'],
        $row['nombreLibro'],
        $row['categoriaLibro'],
        $row['fechaPublicacion'],
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
