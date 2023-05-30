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

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("Prestamo");

$hojaActiva->setCellValue('A1', 'Nombre Autor');
$hojaActiva->setCellValue('B1', 'Titulo del Libro');
$hojaActiva->setCellValue('C1', 'Fecha Prestamo');
$hojaActiva->setCellValue('D1', 'Fecha Devolucion');
$hojaActiva->setCellValue('E1', 'Categoria Libro');
$hojaActiva->setCellValue('F1', 'Nombre');
$hojaActiva->setCellValue('G1', 'Paterno');
$hojaActiva->setCellValue('H1', 'Materno');
$hojaActiva->setCellValue('I1', 'Calle');
$hojaActiva->setCellValue('J1', 'Colonia');
$hojaActiva->setCellValue('K1', 'Cuidad');
$hojaActiva->setCellValue('L1', 'Estado');
$hojaActiva->setCellValue('M1', 'Telefono');
$hojaActiva->setCellValue('N1', 'Pais');

$Fila = 2;

foreach ($datos as $row) {
    $hojaActiva->getColumnDimension('A')->setWidth(20);
    $hojaActiva->setCellValue('A'.$Fila, $row['nombreAutor']);
    $hojaActiva->getColumnDimension('B')->setWidth(20);
    $hojaActiva->setCellValue('B'.$Fila, $row['tituloLibro']);
    $hojaActiva->getColumnDimension('C')->setWidth(20);
    $hojaActiva->setCellValue('C'.$Fila, $row['fechaPrestamo']);
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->setCellValue('D'.$Fila, $row['fechaDevolucion']);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->setCellValue('E'.$Fila, $row['categoriaLibro']);
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $hojaActiva->setCellValue('F'.$Fila, $row['nombre']);
    $hojaActiva->getColumnDimension('G')->setWidth(20);
    $hojaActiva->setCellValue('G'.$Fila, $row['aPaterno']);
    $hojaActiva->getColumnDimension('H')->setWidth(20);
    $hojaActiva->setCellValue('H'.$Fila, $row['aMaterno']);
    $hojaActiva->getColumnDimension('I')->setWidth(20);
    $hojaActiva->setCellValue('I'.$Fila, $row['calle']);
    $hojaActiva->getColumnDimension('J')->setWidth(20);
    $hojaActiva->setCellValue('J'.$Fila, $row['colonia']);
    $hojaActiva->getColumnDimension('K')->setWidth(20);
    $hojaActiva->setCellValue('K'.$Fila, $row['cuidad']);
    $hojaActiva->getColumnDimension('L')->setWidth(20);
    $hojaActiva->setCellValue('L'.$Fila, $row['estado']);
    $hojaActiva->getColumnDimension('M')->setWidth(20);
    $hojaActiva->setCellValue('M'.$Fila, $row['telefono']);
    $hojaActiva->getColumnDimension('N')->setWidth(20);
    $hojaActiva->setCellValue('N'.$Fila, $row['pais']);
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Prestamo.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>
