<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

<?php include("../conexion.php");
$stm=$conexion->prepare("SELECT * FROM libro where estatus = 1");
$stm->execute();
$Libro=$stm->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../header.php");?>
<!-- Button trigger modal -->

<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">Nombre Autor</th>
                <th scope="col">Editorial  </th>
                <th scope="col">Nombre Libro </th>
                <th scope="col">Categoria Libro</th>
                <th scope="col">Fecha Publicacion</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
        <?php foreach($Libro as $libro){?>
        <tr class="">
            <td> <?php echo $libro['nombreAutor']; ?></td>
            <td> <?php echo $libro['editorial']; ?></td>
            <td> <?php echo $libro['nombreLibro']; ?></td>
            <td> <?php echo $libro['categoriaLibro']; ?></td>
            <td> <?php echo $libro['fechaPublicacion']; ?></td>

            <td>
           <a href="edit.php?idLibro=<?php echo $libro['idLibro']; ?>"class="btn btn-warning"><i class="bi bi-pencil"></i></a>
           <a href="delete.php?idLibro=<?php echo $libro['idLibro']; ?>"onclick="return confirm('¿Realmente desea eliminar?')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
            </td>
    </tr>
   
            <?php } ?>  
        </tbody>
    </table>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear">
Agregar</button>
<a href="../Menu/index.html"><input type="button" class="btn btn-outline-dark" value="Regresar"></a>
<a href="pdf.php"class="btn btn-danger"><i class="bi bi-file-earmark-pdf-fill"> Exportar a pdf</i></a>
<a href="excel.php"class="btn btn-success"><i class="bi bi-filetype-xlsx"> Exportar a Excel</i></a>
<a href="exportarcsv.php"class="btn btn-info"><i class="bi bi-filetype-csv">Exportar a csv</i></a>
<a href="jason.php"class="btn btn-dark"><i class="bi bi-filetype-json"> Exportar a jason</i></a>

</div>
<?php include("create.php");?>

<?php include("../foter.php");?>
