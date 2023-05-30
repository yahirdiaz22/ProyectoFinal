<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<?php if ($_POST) {
    $nombreAutor=(isset($_POST['nombreAutor'])?$_POST['nombreAutor']:"");
    $tituloLibro=(isset($_POST['tituloLibro'])?$_POST['tituloLibro']:"");
    $fechaPrestamo=(isset($_POST['fechaPrestamo'])?$_POST['fechaPrestamo']:"");
    $fechaDevolucion=(isset($_POST['fechaDevolucion'])?$_POST['fechaDevolucion']:"");
    $categoriaLibro=(isset($_POST['categoriaLibro'])?$_POST['categoriaLibro']:"");
    $idAutor=(isset($_POST['idAutor'])?$_POST['idAutor']:"");
  
    $stm=$conexion->prepare("INSERT INTO prestamo (nombreAutor,tituloLibro,fechaPrestamo,fechaDevolucion,categoriaLibro,idAutor)
    values(:nombreAutor,:tituloLibro,:fechaPrestamo,:fechaDevolucion,:categoriaLibro,:idAutor)");
    $stm->bindParam(":nombreAutor",$nombreAutor);
    $stm->bindParam(":tituloLibro",$tituloLibro);
    $stm->bindParam(":fechaPrestamo",$fechaPrestamo);
    $stm->bindParam(":fechaDevolucion",$fechaDevolucion);
    $stm->bindParam(":categoriaLibro",$categoriaLibro);
    $stm->bindParam(":idAutor",$idAutor);
    $stm->execute();

  }
  ?>
<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Prestamo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <label for="">Nombre del Autor</label>
        <input type="text" class="form-control" name="nombreAutor" value="">
        <label for="">Titulo del Libro</label>
        <input type="text" class="form-control" name="tituloLibro" value="">
        <label for="">fecha del Prestamo</label>
        <input type="date" class="form-control" name="fechaPrestamo" value="">
        <label for="">fecha de la Devolucion</label>
        <input type="date" class="form-control" name="fechaDevolucion" value="">
        <label for="">Categoria del Libro</label>
        <input type="text" class="form-control" name="categoriaLibro" value="">
        <option selected disabled> --Seleciona el autor--</option>
        <select class="form-control" name="idAutor">
          <?php 
        require_once('../conexion.php');
       $consulta = "SELECT * FROM autor where estatus = 1";
       $stm = $conexion->query($consulta);      
       while ($registro = $stm->fetch(PDO::FETCH_ASSOC)) {
       echo "<option value='" . $registro['idAutor'] . "'>" . $registro['nombre'] . "</option>";
     }
  ?>
        </select>

       
        
      

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-outline-info">Agregar Datos</button>
      </div>
      </form>
    </div>
  </div>
</div>