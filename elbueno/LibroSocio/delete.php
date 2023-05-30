<?php 

include("../conexion.php");

if (isset($_GET['idLibroSocio'])) {
    $txtid=(isset($_GET['idLibroSocio'])?$_GET['idLibroSocio']:"");
    $stm=$conexion->prepare("UPDATE librosocio SET estatus= 0 WHERE idLibroSocio=:txtid");
    $stm->bindparam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
}
header("Location:index.php"); 

  ?>