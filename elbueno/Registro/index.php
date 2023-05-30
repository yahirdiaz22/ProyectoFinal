<?php include("../conexion.php");
$stm=$conexion->prepare("SELECT * FROM usuario");
$stm->execute();
$Autor=$stm->fetchAll(PDO::FETCH_ASSOC);
?>
<?php if ($_POST) {
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $correo=(isset($_POST['correo'])?$_POST['correo']:"");
    $clave=(isset($_POST['clave'])?$_POST['clave']:"");

    
    $stm=$conexion->prepare("INSERT INTO usuario (nombre,correo,clave)
    values(:nombre,:correo,md5(:clave))");
    $stm->bindParam(":nombre",$nombre);
    $stm->bindParam(":correo",$correo);
    $stm->bindParam(":clave",$clave);
    $stm->execute();
    header("location:index.php");

  }
  ?>
  
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">


<br>
<br>
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Crea una Cuenta</h4>
		<p class="divider-text">
    </p>
	<form action="index.php" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nombre" class="form-control" placeholder="Nombre" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="correo" class="form-control" placeholder=Correo type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="clave" class="form-control" placeholder="Crea un password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="x" class="form-control" placeholder="Repita password" type="password">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
    <a;></a>
        <button type="submit" class="btn btn-primary btn-block"> Crear Cuenta  </button>
    </div> <!-- form-group// --> 
</div>
    <p class="text-center">Ya tienes Cuenta? <a href="../InicioSesion/index.php";
        ">Inicia Sesion</a> </p>                                                                 

