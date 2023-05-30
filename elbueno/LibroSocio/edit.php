<?php 

include("../conexion.php");




if (isset($_GET['idLibroSocio'])) {
    $txtid=(isset($_GET['idLibroSocio'])?$_GET['idLibroSocio']:"");
    $stm=$conexion->prepare("SELECT *FROM librosocio where idLibroSocio=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $idLibroSocio=$registro['idLibroSocio'];
    $idLibro=$registro['idLibro'];
    $idSocio=$registro['idSocio'];


}


 if ($_POST) {
    $idLibroSocio=(isset($_POST['idLibroSocio'])?$_POST['idLibroSocio']:"");
    $idLibro=(isset($_POST['idLibro'])?$_POST['idLibro']:"");
    $idSocio=(isset($_POST['idSocio'])?$_POST['idSocio']:"");

     
    $stm=$conexion->prepare("UPDATE librosocio SET idLibroSocio=:idLibroSocio,idLibro=:idLibro,idSocio=:idSocio WHERE idLibroSocio =:txtid ");
    $stm->bindParam(":txtid",$txtid);
    $stm->bindParam(":idLibroSocio",$idLibroSocio);
    $stm->bindParam(":idLibro",$idLibro);
    $stm->bindParam(":idSocio",$idSocio);
    $stm->execute();
    header("location:index.php");

  }
  ?>


<?php include("../header.php");?>

<form action="" method="post">

         <input type="hidden" class="form-control" name="idSocio" value="" placeholder="ingresa el nombre">
        <label for="">ID Libro</label>
        <option selected disabled> --Seleciona el socio--</option>
        <select class="form-control" name="idSocio">
          <?php 
        require_once('../conexion.php');
       $consulta = "SELECT * FROM socio where estatus = 1";
       $stm = $conexion->query($consulta);      
       while ($registro = $stm->fetch(PDO::FETCH_ASSOC)) {
       echo "<option value='" . $registro['idSocio'] . "'>" . $registro['nombre'] . "</option>";
     }
  ?>
        </select>  
        <label for="">ID de Socio</label>
        <option selected disabled> --Seleciona el libro--</option>
        <select class="form-control" name="idLibro">
          <?php 
        require_once('../conexion.php');
       $consulta = "SELECT * FROM libro where estatus = 1";
       $stm = $conexion->query($consulta);      
       while ($registro = $stm->fetch(PDO::FETCH_ASSOC)) {
       echo "<option value='" . $registro['idLibro'] . "'>" . $registro['nombreAutor'] . "</option>";
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