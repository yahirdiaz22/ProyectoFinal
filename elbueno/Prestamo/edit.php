<?php 

include("../conexion.php");

if (isset($_GET['idPrestamo'])) {
    $txtid=(isset($_GET['idPrestamo'])?$_GET['idPrestamo']:"");
    $stm=$conexion->prepare("SELECT *FROM prestamo where idPrestamo=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $idPrestamo=$registro['idPrestamo'];
    $nombreAutor=$registro['nombreAutor'];
    $tituloLibro=$registro['tituloLibro'];
    $fechaPrestamo=$registro['fechaPrestamo'];
    $fechaDevolucion=$registro['fechaDevolucion'];
    $categoriaLibro=$registro['categoriaLibro'];
    $idAutor=$registro['idAutor'];
}

 if ($_POST) {
    $nombreAutor=(isset($_POST['nombreAutor'])?$_POST['nombreAutor']:"");
    $tituloLibro=(isset($_POST['tituloLibro'])?$_POST['tituloLibro']:"");
    $fechaPrestamo=(isset($_POST['fechaPrestamo'])?$_POST['fechaPrestamo']:"");
    $fechaDevolucion=(isset($_POST['fechaDevolucion'])?$_POST['fechaDevolucion']:"");
    $categoriaLibro=(isset($_POST['categoriaLibro'])?$_POST['categoriaLibro']:"");
    $idAutor=(isset($_POST['idAutor'])?$_POST['idAutor']:"");    
    $stm=$conexion->prepare("UPDATE prestamo SET nombreAutor=:nombreAutor,tituloLibro=:tituloLibro,fechaPrestamo=:fechaPrestamo,fechaDevolucion=:fechaDevolucion,categoriaLibro=:categoriaLibro,idAutor=:idAutor WHERE idPrestamo =:txtid ");
    $stm->bindParam(":txtid",$txtid);
    $stm->bindParam(":nombreAutor",$nombreAutor);
    $stm->bindParam(":tituloLibro",$tituloLibro);
    $stm->bindParam(":fechaPrestamo",$fechaPrestamo);
    $stm->bindParam(":fechaDevolucion",$fechaDevolucion);
    $stm->bindParam(":categoriaLibro",$categoriaLibro);
    $stm->bindParam(":idAutor",$idAutor);
    $stm->execute();
    header("location:index.php");
  }
  ?>
<?php include("../header.php");?>

<form action="" method="post">

         <input type="hidden" class="form-control" name="txtid" value="" placeholder="ingresa el nombre">
        <label for="">Nombre del Autor</label>
        <input type="text" class="form-control" name="nombreAutor" value="<?php echo $nombreAutor;?> " placeholder="ingresa el nombre">
        <label for="">Titulo del Libro</label>
        <input type="text" class="form-control" name="tituloLibro" value="<?php echo $tituloLibro;?>" placeholder="ingresa el apellido paterno">
        <label for="">Fecha Prestamo</label>
        <input type="date" class="form-control" name="fechaPrestamo" value="<?php echo $fechaPrestamo;?>" placeholder="ingresa el apellido materno">
        <label for="">Fecha Devolucion</label>
        <input type="date" class="form-control" name="fechaDevolucion" value="<?php echo $fechaDevolucion;?>" placeholder="ingresa la calle">
        <label for="">Categoria del Libro</label>
        <input type="text" class="form-control" name="categoriaLibro" value="<?php echo $categoriaLibro;?>" placeholder="ingresa la colonia">
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
    <a href="index.php" class="btn btn-outline-danger">cancelar</a>
      <button type="submit" class="btn btn-outline-info">Actualizar</button>
      </div>
      </form>
      <?php include("../foter.php");?>
