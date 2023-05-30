<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

<?php include("../conexion.php");
$stm=$conexion->prepare("SELECT * FROM prestamo
INNER JOIN autor ON prestamo.idAutor = autor.idAutor
WHERE prestamo.estatus = 1"
);
$stm->execute();
$Prestamo=$stm->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../header.php");?>

<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">Nombre del Autor</th>
                <th scope="col">Titulo del Libro </th>
                <th scope="col">Fecha del Prestamo </th>
                <th scope="col">Fecha Devolucion</th>
                <th scope="col">Categoria del Libro</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno </th>
                <th scope="col">Apellido Materno </th>
                <th scope="col">Calle</th>
                <th scope="col">Colonia</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Estado</th>
                <th scope="col">Telefono</th>
                <th scope="col">Pais</th>
                <th scope="col">Acciones</th>


            </tr>
        </thead>
        <tbody>
        <?php foreach($Prestamo as $prestamo){?>
        <tr class="">
            <td> <?php echo $prestamo['nombreAutor']; ?></td>
            <td> <?php echo $prestamo['tituloLibro']; ?></td>
            <td> <?php echo $prestamo['fechaPrestamo']; ?></td>
            <td> <?php echo $prestamo['fechaDevolucion']; ?></td>
            <td> <?php echo $prestamo['categoriaLibro']; ?></td>
            <td> <?php echo $prestamo['nombre']; ?></td>
            <td> <?php echo $prestamo['aPaterno']; ?></td>
            <td> <?php echo $prestamo['aMaterno']; ?></td>
            <td> <?php echo $prestamo['calle']; ?></td>
            <td> <?php echo $prestamo['colonia']; ?></td>
            <td> <?php echo $prestamo['cuidad']; ?></td>
            <td> <?php echo $prestamo['estado']; ?></td>
            <td> <?php echo $prestamo['telefono']; ?></td>
            <td> <?php echo $prestamo['pais']; ?></td>
            <td> 
            <a href="edit.php?idPrestamo=<?php echo $prestamo['idPrestamo']; ?>"class="btn btn-warning"><i class="bi bi-pencil"></i></a>
            <a href="delete.php?idPrestamo=<?php echo $prestamo['idPrestamo']; ?>"onclick="return confirm('¿Realmente desea eliminar?')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>

            </td>
    </tr>
            
            <?php } ?>  
        </tbody>
    </table>
    
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear">
Agregar</button>
<a href="../Menu/index.html"><input type="button" class="btn btn-outline-dark" value="Regresar"></a>
<a href="pdf.php"class="btn btn-danger"><i class="bi bi-file-earmark-pdf-fill"> Exportar a pdf</i></a>
<a href="excel.php"class="btn btn-success"><i class="bi bi-filetype-xlsx"> Exportar a Excel</i></a>
<a href="exportarcsv.php"class="btn btn-info"><i class="bi bi-filetype-csv">Exportar a csv</i></a>
<a href="jason.php"class="btn btn-dark"><i class="bi bi-filetype-json"> Exportar a jason</i></a>

<?php include("create.php");?>

<?php include("../foter.php");?>
