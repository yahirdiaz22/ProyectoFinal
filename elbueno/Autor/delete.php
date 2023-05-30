<?php 

include("../conexion.php");

if (isset($_GET['idAutor'])) {
    $txtid=(isset($_GET['idAutor'])?$_GET['idAutor']:"");
    $stm=$conexion->prepare("UPDATE autor SET estatus= 0 WHERE idAutor=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
}
header("Location:index.php"); 

  ?>