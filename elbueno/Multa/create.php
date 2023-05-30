<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<?php if ($_POST) {
    $tituloLibro=(isset($_POST['tituloLibro'])?$_POST['tituloLibro']:"");
    $estadoPago=(isset($_POST['estadoPago'])?$_POST['estadoPago']:"");
    $monto=(isset($_POST['monto'])?$_POST['monto']:"");
    $fechaLimite=(isset($_POST['fechaLimite'])?$_POST['fechaLimite']:"");
    $nombreBibliotecario=(isset($_POST['nombreBibliotecario'])?$_POST['nombreBibliotecario']:"");
       
    $stm=$conexion->prepare("INSERT INTO multa (tituloLibro,estadoPago,monto,fechaLimite,nombreBibliotecario)
    values(:tituloLibro,:estadoPago,:monto,:fechaLimite,:nombreBibliotecario)");
    $stm->bindParam(":tituloLibro",$tituloLibro);
    $stm->bindParam(":estadoPago",$estadoPago);
    $stm->bindParam(":monto",$monto);
    $stm->bindParam(":fechaLimite",$fechaLimite);
    $stm->bindParam(":nombreBibliotecario",$nombreBibliotecario);
    $stm->execute();
    header("location:index.php");

  }
  ?>
<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Multa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">Titulo del libro</label>
        <input type="text" class="form-control" name="tituloLibro" value="" placeholder="ingresa el titulo del libro ">
        <label for="">Estado de pago</label>
        <input type="text" class="form-control" name="estadoPago" value=""placeholder="ingresa el estado de pago">
        <label for="">Monto</label>
        <input type="text" class="form-control" name="monto" value=""placeholder="ingresa el monto a pagar ">
        <label for="">Fecha Limite</label>
        <input type="date" class="form-control" name="fechaLimite" value=""placeholder="ingresa el id del LibroSocio ">
        <label for="">Nombre del Bibliotecario</label>
        <input type="text" class="form-control" name="nombreBibliotecario" value=""placeholder="ingresa el nombre del bibliotecario ">

    </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
        <button type="sumbit  " class="btn btn-outline-info">Agregar Datos</button>
      </div>
      </form>
    </div>
  </div>
</div>