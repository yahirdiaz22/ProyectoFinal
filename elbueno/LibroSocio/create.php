<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<?php if ($_POST) {
    $idLibroSocio=(isset($_POST['idLibroSocio'])?$_POST['idLibroSocio']:"");
    $idLibro=(isset($_POST['idLibro'])?$_POST['idLibro']:"");
    $idSocio=(isset($_POST['idSocio'])?$_POST['idSocio']:"");
          
    $stm=$conexion->prepare("INSERT INTO librosocio (idLibroSocio,idLibro,idSocio)
    values(:idLibroSocio,:idLibro,:idSocio)");
    $stm->bindParam(":idLibroSocio",$idLibroSocio);
    $stm->bindParam(":idLibro",$idLibro);
    $stm->bindParam(":idSocio",$idSocio);
    $stm->execute();
    header("location:index.php");

  }
  ?>
<!-- Modal -->
<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar LibroSocio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        </select>
        <label for="">id de Socio</label>
        <option selected disabled> --Seleciona el autor--</option>
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
        <label for="">id de Libro</label>
        <option selected disabled> --Seleciona el autor--</option>
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
      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
        <button type="sumbit" class="btn btn-outline-info">Agregar Datos</button>
      </div>
      </form>

    </div>
  </div>
</div>