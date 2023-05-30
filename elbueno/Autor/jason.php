<?php
require ("../conexion.php");
$consulta = "SELECT * FROM autor WHERE estatus = 1";
$statement = $conexion->prepare($consulta);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

$autor = array();

foreach ($resultado as $row) {
    $registro = array(
        'Nombre' => $row['nombre'],
        'Apellido Paterno' => $row['aPaterno'],
        'Apellido Materno' => $row['aMaterno'],
        'Calle' => $row['calle'],
        'Colonia' => $row['colonia'],
        'Estado' => $row['estado'],
        'Telefono' => $row['telefono'],
        'Pais' => $row['pais'],
    );

    $autor[] = $registro;
}

$conexion = null;

$json = json_encode($autor, JSON_PRETTY_PRINT);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Autor.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
