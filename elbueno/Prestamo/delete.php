<?php 

include("../conexion.php");

if (isset($_GET['idPrestamo'])) {
    $txtid=(isset($_GET['idPrestamo'])?$_GET['idPrestamo']:"");
    $stm=$conexion->prepare("UPDATE prestamo SET estatus= 0 WHERE idPrestamo=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
}
header("Location:index.php"); 

  ?>