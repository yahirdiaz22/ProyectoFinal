<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<?php if ($_POST) {
    $nombreAutor=(isset($_POST['nombreAutor'])?$_POST['nombreAutor']:"");
    $editorial=(isset($_POST['editorial'])?$_POST['editorial']:"");
    $nombreLibro=(isset($_POST['nombreLibro'])?$_POST['nombreLibro']:"");
    $categoriaLibro=(isset($_POST['categoriaLibro'])?$_POST['categoriaLibro']:"");
    $fechaPublicacion=(isset($_POST['fechaPublicacion'])?$_POST['fechaPublicacion']:"");
       
    $stm=$conexion->prepare("INSERT INTO libro (nombreAutor,editorial,nombreLibro,categoriaLibro,fechaPublicacion)
    values(:nombreAutor,:editorial,:nombreLibro,:categoriaLibro,:fechaPublicacion)");
    $stm->bindParam(":nombreAutor",$nombreAutor);
    $stm->bindParam(":editorial",$editorial);
    $stm->bindParam(":nombreLibro",$nombreLibro);
    $stm->bindParam(":categoriaLibro",$categoriaLibro);
    $stm->bindParam(":fechaPublicacion",$fechaPublicacion);
    $stm->execute();
    header("location:index.php");

  }
  ?>
<!-- Modal -->
<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
      <label for="">Nombre Autor</label>
        <input type="text" class="form-control" name="nombreAutor" value=" " placeholder="ingresa el nombre del autor">
        <label for="">Editorial</label>
        <input type="text" class="form-control" name="editorial" value="" placeholder="ingresa el editorial">
        <label for="">Nombre del Libro</label>
        <input type="text" class="form-control" name="nombreLibro" value="" placeholder="ingresa el nombre del libro">
        <label for="">Categoria del Libro</label>
        <input type="text" class="form-control" name="categoriaLibro" value="" placeholder="ingresa la categoria del libro">
        <label for="">Fecha de Publicacion</label>
        <input type="date" class="form-control" name="fechaPublicacion" value="" placeholder="ingresa la fecha de publicacion">
        
    </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
        <button type="sumbit" class="btn btn-outline-info">Agregar Datos</button>
      </div>
      </form>

    </div>
  </div>
</div>