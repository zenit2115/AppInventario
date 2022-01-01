<?php

session_start();

require("acciones/conexion.php");

if(isset($_SESSION['login'])){

echo'<script> window.location="home.php"</script>';

	}

?>

<!doctype html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>Inventario</title>

    <link rel="icon" href="favicon/favicon.ico">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="public/js/jquery-1.11.2.min.js"></script>
	<script src="public/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" href="public/css/estilos.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    

<style type="text/css">

/*Tamaño cuerpo*/

html,body{height:100%;width:100%}

		

.sinpadding [class*="col-"]{padding:0;}



/*Contenedor de la imagen de background*/

.container {

	width: 100%;

    padding-right: 0px;

    padding-left: 0px;

    margin-right: 0px;

    margin-left: 0px;

	margin-top: -20px;

}



/*Para posicionar sobre el slide el logo de la institución y el formulario*/

.logo {

   position: absolute;

   margin-top:10%;

   margin-bottom:auto;

   margin-left:25%;

   margin-right:auto;

   width:50%;

   z-index: 9999999;

}



/*.logo2 {

   position: absolute;

   margin-bottom:auto;

   margin-left:30%;

   margin-right:auto;

   width:50%;

   z-index: 9999999;

}*/



img{width:100px;height:100px;}

form{width:100%;height:100%;}



</style>

</head>

<body>

	<div class="container sinpadding">

		<div class=" titulo_formulario logo">

        	<img src="images/Logo.jpeg" alt="logo" width="100px">

            

            <form class="form-horizontal form-signin logo2" action="validarSession.php" method="post" autocomplete="off">

                <div class="form-group">

					<label class="col-lg-2 control label" for=""></label>

					<div class="col-lg-10">

						<input type="email" pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$" title="Ingresa tu correo ej: a@a.com"  name="login" class="form-control" id="login" placeholder="Correo Electronico" required>	

					</div>

				</div>

                

				<div class="form-group">

					<label class="col-lg-2 control label" for=""></label>

					<div class="col-lg-10">

						<input type="password" pattern="^[A-Za-z0-9 ]{4,20}$" title="Ingrese solo numeros y texto, mínimo de 6 digitos y máximo de 20 cifras" name="pass" class="form-control" id="pass" placeholder="Contraseña" maxlength="20" required>	

					</div>

				</div> 

                

                <div class="form-group">

                    <div class="col-sm-10">

                        <select name="prueba" class="form-control chosen-select" style="width:200px;" id="prueba" required>	

                           <option value="asistente">asistente</option>

                           <option value="admin">admin</option>

                        </select>

                    </div>

                </div>



				<div class="form-group">

					<div class="col-sm-offset-4  col-sm-4 boton_formulario">

						<button type="submit" class="btn btn-lg btn-primary" name="entrarPagina">Entrar</button>

					</div>

				</div>

			</form>

		</div>

		<br>

        <div class="col-md-12">

        	<div id="carousel-1" class="carousel slide" data-ride="carousel">

            

            <!--Botones indicadores (Circulos de cambio de imagen)-->

            <ol class="carousel-indicators">

            	<li data-target="#carousel-1" data-slide-to="0" class="active"></li>

                <li data-target="#carousel-1" data-slide-to="1"></li>

            </ol>

            

            <!--Contenedor de los slides-->

				<div class="carousel-inner" role="listbox">

                	<div class="item active">

                        <!--   <img src="images/a.png" alt="Dormitorio1" class="img-responsive"> -->   			

                        <img src="images/colegio.jpg" alt="Dormitorio1" class="img-responsive">

                        <div class="carousel-caption hidden-xs hidden-sm">

                            <h3>Inventario</h3>

                            <p>local</p>

                        </div>

            		</div>

                    

					<div class="item">

                        <img src="images/inventario.jpg" alt="Dormitorio1" class="img-responsive">       			

                        

                        <div class="carousel-caption hidden-xs hidden-sm">

                        <h3>Inventario</h3>

                        <p>local</p>

                        </div>

            		</div>



                </div>

                

                <!--Controles de flechas de izquierda y derecha-->

                <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">

                <span class="glyphicon glyphicon-chevron-left " aria-hidden="true"></span>

                <span class="sr-only">Anterior</span>

                </a>

                

                

                 <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">

                <span class="glyphicon glyphicon-chevron-right " aria-hidden="true"></span>

                <span class="sr-only">siguiente</span>

                </a>

            </div>

        </div>

	</div>



	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	

</body>

</html>