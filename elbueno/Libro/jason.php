<?php
require ("../conexion.php");
$consulta = "SELECT * FROM libro WHERE estatus = 1";
$statement = $conexion->prepare($consulta);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

$Libro = array();

foreach ($resultado as $row) {
    $registro = array(
        'Nombre Autor' => $row['nombreAutor'],
        'Editorial' => $row['editorial'],
        'Nombre Libro' => $row['nombreLibro'],
        'Categoria Libro' => $row['categoriaLibro'],
        'Fecha Publicacion' => $row['fechaPublicacion'],
    );

    $Libro[] = $registro;
}
$conexion = null;
$json = json_encode($Libro, JSON_PRETTY_PRINT);
header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Libro.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
