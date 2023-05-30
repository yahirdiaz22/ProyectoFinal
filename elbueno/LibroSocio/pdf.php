<?php
require('../pdf/fpdf.php');
header('Content-Type: text/html; charset=utf-8');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(60);
        $this->Cell(70,10,'Reporte de Libro y Socio',0,0,'C');
        $this->Ln(20);
        $this->Cell(40,10,utf8_decode('Nombre del Autor'),1,0,'C',0);
        $this->Cell(40,10,utf8_decode('Editorial'),1,0,'C',0);
        $this->Cell(40,10,utf8_decode('Nombre del Libro'),1,0,'C',0);
        $this->Cell(40,10,utf8_decode('Categoria'),1,0,'C',0);
        $this->Cell(39,10,utf8_decode('Fecha Publicacion'),1,0,'C',0);
        $this->Cell(30,10,utf8_decode('Calle'),1,0,'C',0);
        $this->Cell(30,10,utf8_decode('Colonia'),1,0,'C',0);
        $this->Cell(30,10,utf8_decode('Cuidad'),1,0,'C',0);
        $this->Cell(20,10,utf8_decode('Estado'),1,0,'C',0);
        $this->Cell(25,10,utf8_decode('Telefono'),1,0,'C',0);
        $this->Cell(20,10,utf8_decode('Nombre'),1,0,'C',0);
        $this->Cell(20,10,utf8_decode('Paterno'),1,0,'C',0);
        $this->Cell(20,10,utf8_decode('Materno'),1,1,'C',0);
    }
    
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

include("../conexion.php");

$servidor= "localhost";
$db= "biblio";
$username="root";
$password="";
try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $username, $password);
} catch (PDOException $e) {
    echo "Error al conectarse a la base de datos: " . $e->getMessage();
}

$consulta = "SELECT * FROM librosocio
INNER JOIN libro ON librosocio.idLibro = libro.idLibro
INNER JOIN socio ON librosocio.idSocio = socio.idSocio where librosocio.estatus = 1";
$stmt = $conexion->prepare($consulta);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 11);

foreach ($resultado as $row) {
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(40,10,$row['nombreAutor'],1,0,'C',0);
    $pdf->Cell(40,10,$row['editorial'],1,0,'C',0);
    $pdf->Cell(40,10,$row['nombreLibro'],1,0,'C',0);
    $pdf->Cell(40,10,$row['categoriaLibro'],1,0,'C',0);
    $pdf->Cell(39,10,$row['fechaPublicacion'],1,0,'C',0);
    $pdf->Cell(30,10,$row['calle'],1,0,'C',0);
    $pdf->Cell(30,10,$row['colonia'],1,0,'C',0);
    $pdf->Cell(30,10,$row['cuidad'],1,0,'C',0);
    $pdf->Cell(20,10,$row['estado'],1,0,'C',0);
    $pdf->Cell(25,10,$row['telefono'],1,0,'C',0);
    $pdf->Cell(20,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(20,10,$row['aPaterno'],1,0,'C',0);
    $pdf->Cell(20,10,$row['aMaterno'],1,1,'C',0);
}
$pdf->Output('LibroSocio.pdf','I');
?>
