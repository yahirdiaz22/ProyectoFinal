<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<?php if ($_POST) {
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $aPaterno=(isset($_POST['aPaterno'])?$_POST['aPaterno']:"");
    $aMaterno=(isset($_POST['aMaterno'])?$_POST['aMaterno']:"");
    $calle=(isset($_POST['calle'])?$_POST['calle']:"");
    $colonia=(isset($_POST['colonia'])?$_POST['colonia']:"");
    $cuidad=(isset($_POST['cuidad'])?$_POST['cuidad']:"");
    $estado=(isset($_POST['estado'])?$_POST['estado']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
    $pais=(isset($_POST['pais'])?$_POST['pais']:"");
    $stm=$conexion->prepare("INSERT INTO autor (nombre,aPaterno,aMaterno,calle,colonia,cuidad,estado,telefono,pais)
    values(:nombre,:aPaterno,:aMaterno,:calle,:colonia,:cuidad,:estado,:telefono,:pais)");
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
    error_reporting(E_ALL & ~E_WARNING);
    header("location:https://localhost/web/elbueno/Autor/index.php");

}
?>
<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="" placeholder="ingresa el nombre">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" name="aPaterno" value="" placeholder="ingresa el apellido paterno">
        <label for="">Apellido Materno</label>
        <input type="text" class="form-control" name="aMaterno" value="" placeholder="ingresa el apellido materno">
        <label for="">Calle</label>
        <input type="text" class="form-control" name="calle" value="" placeholder="ingresa la calle">
        <label for="">Colonia</label>
        <input type="text" class="form-control" name="colonia" value="" placeholder="ingresa la colonia">
        <label for="">Cuidad</label>
        <input type="text" class="form-control" name="cuidad" value="" placeholder="ingresa la cuidad ">
        <label for="">Estado</label>
        <input type="text" class="form-control" name="estado" value="" placeholder="ingresa el estado">
        <label for="">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="" placeholder="ingresa el telefono  ">
        <label for="">Pais</label>
        <input type="text" class="form-control" name="pais" value="" placeholder="ingresa el pais">    
    </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-outline-info">Agregar Datos</button>
      </div>
      </form>
    </div>
  </div>
</div>