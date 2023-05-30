<?php 

include("../conexion.php");

if (isset($_GET['idSocio'])) {
    $txtid=(isset($_GET['idSocio'])?$_GET['idSocio']:"");
    $stm=$conexion->prepare("UPDATE socio SET estatus= 0 WHERE idSocio=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
}
header("Location:index.php"); 

  ?>