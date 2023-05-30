<?php 

include("../conexion.php");

if (isset($_GET['idMulta'])) {
    $txtid=(isset($_GET['idMulta'])?$_GET['idMulta']:"");
    $stm=$conexion->prepare("UPDATE multa SET estatus= 0 WHERE idMulta=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
}
header("Location:index.php"); 

  ?>