<?php 

include("../conexion.php");

if (isset($_GET['idLibro'])) {
    $txtid=(isset($_GET['idLibro'])?$_GET['idLibro']:"");
    $stm=$conexion->prepare("UPDATE libro SET estatus= 0 WHERE idLibro=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
}
header("Location:index.php"); 

  ?>