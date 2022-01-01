<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cargar información dinámica</title>
	<link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include("modal_agregar.php");?>
<?php include("modal_modificar.php");?>
<?php include("modal_eliminar.php");?>
	<div class="container-fluid">
		<div class='col-xs-6'>	
			<h3> Usuarios</h3>
		</div>
		<div class='col-xs-6'>
        	<h2>
				<!-- <a href="exportar.php" class="btn btn-danger">Exportar Excel</a>-->
			</h2>
            <h3 class='text-right'>		
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#dataRegister"><i class='glyphicon glyphicon-plus'></i> Agregar</button>
			</h3>
		</div>	
		<div class="row">
			<div class="col-xs-12">
				<div id="loader" class="text-center"> <img src="loader.gif"></div>
				<div class="datos_ajax_delete"></div>
				<div class="outer_div"></div>
			</div>
		</div>
	</div>
<script src="../../public/js/jquery-1.11.2.min.js"></script>
<script src="../../public/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../public/js/jquery.Rut.js"></script>
<script type="text/javascript" src="../../public/js/jquery.Rut.min.js"></script>
<script src="js/app.js"></script>
<script src="../../public/js/separadorMiles.js"></script>
<script src="../../public/js/javaScript.js"></script> 
<script>
	$(document).ready(function(){
		load(1);
		$('#icprod_rut_responsable').Rut();
		$('#icprod_rut_responsables').Rut();
	});
</script>

</body>
</html>