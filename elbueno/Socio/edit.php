<?php 

include("../conexion.php");




if (isset($_GET['idSocio'])) {
    $txtid=(isset($_GET['idSocio'])?$_GET['idSocio']:"");
    $stm=$conexion->prepare("SELECT *FROM socio where idSocio=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $idSocio=$registro['idSocio'];
    $nombre=$registro['nombre'];
    $aPaterno=$registro['aPaterno'];
    $aMaterno=$registro['aMaterno'];
    $calle=$registro['calle'];
    $colonia=$registro['colonia'];
    $cuidad=$registro['cuidad'];
    $estado=$registro['estado'];
    $telefono=$registro['telefono'];
    $pais=$registro['pais'];

}


 if ($_POST) {
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $aPaterno=(isset($_POST['aPaterno'])?$_POST['aPaterno']:"");
    $aMaterno=(isset($_POST['aMaterno'])?$_POST['aMaterno']:"");
    $calle=(isset($_POST['calle'])?$_POST['calle']:"");
    $colonia=(isset($_POST['colonia'])?$_POST['colonia']:"");
    $cuidad=(isset($_POST['cuidad'])?$_POST['cuidad']:"");
    $estado=(isset($_POST['estado'])?$_POST['estado']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
    $pais=(isset($_POST['pais'])?$_POST['pais']:"");
    
    $stm=$conexion->prepare("UPDATE socio SET nombre=:nombre,aPaterno=:aPaterno,aMaterno=:aMaterno,calle=:calle,colonia=:colonia,cuidad=:cuidad,estado=:estado,telefono=:telefono,pais=:pais WHERE idSocio =:txtid ");
    $stm->bindParam(":txtid",$txtid);
    $stm->bindParam(":nombre",$nombre);
    $stm->bindParam(":aPaterno",$aPaterno);
    $stm->bindParam(":aMaterno",$aMaterno);
    $stm->bindParam(":calle",$calle);
    $stm->bindParam(":colonia",$colonia);
    $stm->bindParam(":cuidad",$cuidad);
    $stm->bindParam(":estado",$estado);
    $stm->bindParam(":telefono",$telefono);
    $stm->bindParam(":pais",$pais);
    $stm->execute();
    header("location:index.php");

  }
  ?>









<?php include("../header.php");?>

<form action="" method="post">

         <input type="hidden" class="form-control" name="txtid" value="" placeholder="ingresa el nombre">
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?> " placeholder="ingresa el nombre">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" name="aPaterno" value="<?php echo $aPaterno;?>" placeholder="ingresa el apellido paterno">
        <label for="">Apellido Materno</label>
        <input type="text" class="form-control" name="aMaterno" value="<?php echo $aMaterno;?>" placeholder="ingresa el apellido materno">
        <label for="">Calle</label>
        <input type="text" class="form-control" name="calle" value="<?php echo $calle;?>" placeholder="ingresa la calle">
        <label for="">Colonia</label>
        <input type="text" class="form-control" name="colonia" value="<?php echo $colonia;?>" placeholder="ingresa la colonia">
        <label for="">Cuidad</label>
        <input type="text" class="form-control" name="cuidad" value="<?php echo $cuidad;?>" placeholder="ingresa la cuidad ">
        <label for="">Estado</label>
        <input type="text" class="form-control" name="estado" value="<?php echo $estado;?>" placeholder="ingresa el estado">
        <label for="">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="<?php echo $telefono;?>" placeholder="ingresa el telefono  ">
        <label for="">Pais</label>
        <input type="text" class="form-control" name="pais" value="<?php echo $pais;?>" placeholder="ingresa el pais">
        
    </div>
      <div class="modal-footer">
    <a href="index.php" class="btn btn-outline-danger">cancelar</a>
      <button type="submit" class="btn btn-outline-info">Actualizar</button>
      </div>
      </form>
      <?php include("../foter.php");?>
