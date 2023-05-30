<?php
require('../pdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(60);
        $this->Cell(70,10,'Reporte de Libros',0,0,'C');
        $this->Ln(20);
        $this->Cell(40,10,utf8_decode('Nombre del Autor'),1,0,'C',0);
        $this->Cell(40,10,utf8_decode('Editorial'),1,0,'C',0);
        $this->Cell(40,10,utf8_decode('Nombre del Libro'),1,0,'C',0);
        $this->Cell(40,10,utf8_decode('Categoria'),1,0,'C',0);
        $this->Cell(39,10,utf8_decode('Fecha Publicacion'),1,1,'C',0);
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

$consulta = "SELECT * FROM libro";
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
    $pdf->Cell(39,10,$row['fechaPublicacion'],1,1,'C',0);
}
$pdf->Output('Libro.pdf','D');
?>
