<?php
require ("../conexion.php");
$consulta = "SELECT * FROM Socio WHERE estatus = 1";
$statement = $conexion->prepare($consulta);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

$socios = array();

foreach ($resultado as $row) {
    $socio = array(
        'Telefono' => $row['telefono'],
        'Calle' => $row['calle'],
        'Colonia' => $row['colonia'],
        'Estado' => $row['estado'],
        'Ciudad' => $row['cuidad'],
        'Pais' => $row['pais'],
        'Nombre' => $row['nombre'],
        'Apellido Paterno' => $row['aPaterno'],
        'Apellido Materno' => $row['aMaterno'],
    );

    $socios[] = $socio;
}

$conexion = null;

$json = json_encode($socios, JSON_PRETTY_PRINT);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Socio.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
