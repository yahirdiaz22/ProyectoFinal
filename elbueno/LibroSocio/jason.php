<?php
require ("../conexion.php");
$consulta = "SELECT * FROM librosocio
INNER JOIN libro ON librosocio.idLibro = libro.idLibro
INNER JOIN socio ON librosocio.idSocio = socio.idSocio where librosocio.estatus = 1";
$statement = $conexion->prepare($consulta);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

$autor = array();

foreach ($resultado as $row) {
    $grupo = array(
        'Nombre Autor' => $row['nombreAutor'],
        'Editorial' => $row['editorial'],
        'Nombre Libro' => $row['nombreLibro'],
        'Categoria Libro' => $row['categoriaLibro'],
        'Fecha Publicacion' => $row['fechaPublicacion'],
        'Nombre' => $row['nombre'],
        'Apellido Paterno' => $row['aPaterno'],
        'Apellido Materno' => $row['aMaterno'],
        'Calle' => $row['calle'],
        'Colonia' => $row['colonia'],
        'Estado' => $row['estado'],
        'Telefono' => $row['telefono'],
        'Pais' => $row['pais'],

    );

    $autor[] = $autor;
}

$conexion = null;

$json = json_encode($autor);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Autor.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
