<?php 

include("../conexion.php");

if (isset($_GET['idMulta'])) {
    $txtid=(isset($_GET['idMulta'])?$_GET['idMulta']:"");
    $stm=$conexion->prepare("SELECT *FROM multa where idMulta=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $idMulta=$registro['idMulta'];
    $tituloLibro=$registro['tituloLibro'];
    $estadoPago=$registro['estadoPago'];
      $monto=$registro['monto'];
    $fechaLimite=$registro['fechaLimite'];
    $nombreBibliotecario=$registro['nombreBibliotecario'];
}


 if ($_POST) {
    $tituloLibro=(isset($_POST['tituloLibro'])?$_POST['tituloLibro']:"");
    $estadoPago=(isset($_POST['estadoPago'])?$_POST['estadoPago']:"");
    $monto=(isset($_POST['monto'])?$_POST['monto']:"");
    $fechaLimite=(isset($_POST['fechaLimite'])?$_POST['fechaLimite']:"");
    $nombreBibliotecario=(isset($_POST['nombreBibliotecario'])?$_POST['nombreBibliotecario']:"");


     
    $stm=$conexion->prepare("UPDATE multa SET tituloLibro=:tituloLibro,estadoPago=:estadoPago,monto=:monto,fechaLimite=:fechaLimite,nombreBibliotecario=:nombreBibliotecario WHERE idMulta =:txtid ");
    $stm->bindParam(":txtid",$txtid);
    $stm->bindParam(":tituloLibro",$tituloLibro);
    $stm->bindParam(":estadoPago",$estadoPago);
    $stm->bindParam(":monto",$monto);
    $stm->bindParam(":fechaLimite",$fechaLimite);
    $stm->bindParam(":nombreBibliotecario",$nombreBibliotecario);

    $stm->execute();
    header("location:index.php");

  }
  ?>


<?php include("../header.php");?>

<form action="" method="post">

         <input type="hidden" class="form-control" name="txtid" value="" placeholder="ingresa el nombre">
        <label for="">Titulo del Libro del Autor</label>
        <input type="text" class="form-control" name="tituloLibro" value="<?php echo $tituloLibro ;?> " placeholder="ingresa el nombre del autor">
        <label for="">Estado de Pago</label>
        <input type="text" class="form-control" name="estadoPago" value="<?php echo $estadoPago;?>" placeholder="ingresa el editorial">
        <label for="">Monto</label>
        <input type="text" class="form-control" name="monto" value="<?php echo $monto;?>" placeholder="ingresa el nombre del libro">
        <label for="">Fecha Limite</label>
        <input type="text" class="form-control" name="fechaLimite" value="<?php echo $fechaLimite ;?> " placeholder="ingresa el nombre del autor">
        <label for="">Nombre del Bibliotecario</label>
        <input type="text" class="form-control" name="nombreBibliotecario" value="<?php echo $nombreBibliotecario;?>" placeholder="ingresa el editorial">
   
    </div>
      <div class="modal-footer">
    <a href="index.php" class="btn btn-outline-danger">cancelar</a>
      <button type="submit" class="btn btn-outline-info">Actualizar</button>
      </div>
      </form>
      <?php include("../foter.php");?>