<?php
require ("../conexion.php");
$consulta = "SELECT * FROM prestamo WHERE estatus = 1";
$statement = $conexion->prepare($consulta);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

$autor = array();

foreach ($resultado as $row) {
    $grupo = array(
        'Nombre Autor' => $row['nombreAutor'],
        'Titulo Libro' => $row['tituloLibro'],
        'Fecha Prestamo' => $row['fechaPrestamo'],
        'Fecha Devolucion' => $row['fechaDevolucion'],
        'Categoria Libro' => $row['categoriaLibro'],
    );

    $autor[] = $autor;
}

$conexion = null;

$json = json_encode($autor);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Prestamo.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
