<?php 

include("../conexion.php");




if (isset($_GET['idLibro'])) {
    $txtid=(isset($_GET['idLibro'])?$_GET['idLibro']:"");
    $stm=$conexion->prepare("SELECT *FROM libro where idLibro=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $nombreAutor=$registro['nombreAutor'];
    $editorial=$registro['editorial'];
    $nombreLibro=$registro['nombreLibro'];
    $categoriaLibro=$registro['categoriaLibro'];
    $fechaPublicacion=$registro['fechaPublicacion'];

}


 if ($_POST) {
    $nombreAutor=(isset($_POST['nombreAutor'])?$_POST['nombreAutor']:"");
    $editorial=(isset($_POST['editorial'])?$_POST['editorial']:"");
    $nombreLibro=(isset($_POST['nombreLibro'])?$_POST['nombreLibro']:"");
    $categoriaLibro=(isset($_POST['categoriaLibro'])?$_POST['categoriaLibro']:"");
    $fechaPublicacion=(isset($_POST['fechaPublicacion'])?$_POST['fechaPublicacion']:"");
     
    $stm=$conexion->prepare("UPDATE libro SET nombreAutor=:nombreAutor,editorial=:editorial,nombreLibro=:nombreLibro,categoriaLibro=:categoriaLibro,fechaPublicacion=:fechaPublicacion WHERE idLibro =:txtid ");
    $stm->bindParam(":txtid",$txtid);
    $stm->bindParam(":nombreAutor",$nombreAutor);
    $stm->bindParam(":editorial",$editorial);
    $stm->bindParam(":nombreLibro",$nombreLibro);
    $stm->bindParam(":categoriaLibro",$categoriaLibro);
    $stm->bindParam(":fechaPublicacion",$fechaPublicacion);
    $stm->execute();
    header("location:index.php");

  }
  ?>


<?php include("../header.php");?>

<form action="" method="post">

         <input type="hidden" class="form-control" name="txtid" value="" placeholder="ingresa el nombre">
        <label for="">Nombre Autor</label>
        <input type="text" class="form-control" name="nombreAutor" value="<?php echo $nombreAutor;?> " placeholder="ingresa el nombre del autor">
        <label for="">Editorial</label>
        <input type="text" class="form-control" name="editorial" value="<?php echo $editorial;?>" placeholder="ingresa el editorial">
        <label for="">Nombre del Libro</label>
        <input type="text" class="form-control" name="nombreLibro" value="<?php echo $nombreLibro;?>" placeholder="ingresa el nombre del libro">
        <label for="">Categoria del Libro</label>
        <input type="text" class="form-control" name="categoriaLibro" value="<?php echo $categoriaLibro;?>" placeholder="ingresa la categoria del libro">
        <label for="">Fecha de Publicacion</label>
        <input type="date" class="form-control" name="fechaPublicacion" value="<?php echo $fechaPublicacion;?>" placeholder="ingresa la fecha de publicacion">
    </div>
      <div class="modal-footer">
    <a href="index.php" class="btn btn-outline-danger">cancelar</a>
      <button type="submit" class="btn btn-outline-info">Actualizar</button>
      </div>
      </form>
      <?php include("../foter.php");?>