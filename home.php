<?php
	session_start();
	require("acciones/conexion.php");
	if(/*isset*/($_SESSION['prueba']=='admin')) {

		// echo "<pre>";
		// echo print_r($_SESSION);
		// echo "</pre>";
		// die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="icon" href="favicon/favicon.ico">
	<title>Inventario</title>
	<link href="public/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap-theme.min.css">
	<script src="public/js/jquery-1.11.2.min.js"></script>
	<script src="public/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" href="public/css/estilos.css">
</head>

<body>

    <nav class="navbar navbar-default">
		<div class="container-fluid navbar_menu">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a style="color: white;float: left;padding: 20px 140px;font-size: 26px;height: 50px;" >CONTROL DE INVENTARIOS</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right"> 
					<li class="dropdown navbar_dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Bienvenido Administrador<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

<div class="row">
    <div class="col-sm-2">
        <ul class="nav nav-pills nav-stacked menu_izquierdo">
            <li class="text-center"><strong>Menú</strong></li>
			<li role="presentation" class="active"><a class="ajax-link" href="home2.php" target="miIframe"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Inicio</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/producto/index.php" target="miIframe"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Productos</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/proveedor/index.php" target="miIframe"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Proveedores</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/reportes/reportes.php" target="miIframe"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Reportes </a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/usuario/index.php" target="miIframe"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Usuarios</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/configuracion/index.php" target="miIframe"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Configuración</a></li>
			<!--Modulos de categorias, subcategorias, tipos de pagos, tipos de subvención y tipos de documentos-->
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/moduloPagos/index.php" target="miIframe"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Módulo tipo de pagos</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/moduloDocumentos/index.php" target="miIframe"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Módulo tipo de documentos</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/moduloSubvencion/index.php" target="miIframe"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Módulo tipo de subvención</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/moduloCategorias/index.php" target="miIframe"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Módulo tipo de categorias</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/moduloSubCategorias/index.php" target="miIframe"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Módulo tipo de subcategorias</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/respaldo/index.php" target="miIframe"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Módulo respaldo</a></li>

<li role="presentation" class="active"><a class="ajax-link" href="fuentes/restaurar/index.php" target="miIframe"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Módulo restauración</a></li> 
			<li role="presentation" class="active"><a class="ajax-link" href="fuentes/moduloBitacora/index.php" target="miIframe"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>  Bitácora</a></li>
			<li role="presentation" class="active"><a class="ajax-link" href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Cerrar Sesión</a></li>
		</ul>
    </div>

    <div class="col-lg-10 embed-responsive embed-responsive-4by3" >
		<iframe class="embed-responsive-item" name="miIframe" src="home2.php" style="border:none;" frameborder="0"></iframe>
    </div>
</div>

<footer class="footer">
	<div class="container-fluid">
		<p class="pull-left">&copy; <a href="http://inventario-colegio.cl/" target="_blank">Todos los Derechos Reservados</a></p>
	</div>
</footer>

</body>

</html>


<?php

}else{
	echo '<script> window.location="home3.php"; </script>';
}

?>

