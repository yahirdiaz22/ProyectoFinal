<?php
require ("../conexion.php");
$consulta = "SELECT * FROM multa WHERE estatus = 1";
$statement = $conexion->prepare($consulta);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

$autor = array();

foreach ($resultado as $row) {
    $registro = array(
        'Titulo Libro' => $row['tituloLibro'],
        'Estado Pago' => $row['estadoPago'],
        'Monto' => $row['monto'],
        'Fecha Limite' => $row['fechaLimite'],
        'Nombre Bibliotecario' => $row['nombreBibliotecario'],
    );

    $autor[] = $registro;
}

$conexion = null;

$json = json_encode($autor, JSON_PRETTY_PRINT);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Multa.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
