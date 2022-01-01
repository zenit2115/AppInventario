<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');;

    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }

    if (@mysqli_connect_errno()) {

        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

    }

	/*Inicia validacion del lado del servidor*/

	if (empty($_POST['icp_rut'])){
			$errors[] = "RUT vacío";
	} else if (empty($_POST['icp_nombre'])){
		$errors[] = "icp_nombre vacío";
	}  else if (
			!empty($_POST['icp_rut']) && 
			!empty($_POST['icp_nombre'])
	){

		$icp_rut=mysqli_real_escape_string($con,(strip_tags($_POST["icp_rut"],ENT_QUOTES)));
		$icp_nombre=mysqli_real_escape_string($con,(strip_tags($_POST["icp_nombre"],ENT_QUOTES)));
		$icp_nombrecontacto=mysqli_real_escape_string($con,(strip_tags($_POST["icp_nombrecontacto"],ENT_QUOTES)));
		$icp_celular=mysqli_real_escape_string($con,(strip_tags($_POST["icp_celular"],ENT_QUOTES)));
		$icp_telefono=mysqli_real_escape_string($con,(strip_tags($_POST["icp_telefono"],ENT_QUOTES)));
		$icp_direccion=mysqli_real_escape_string($con,(strip_tags($_POST["icp_direccion"],ENT_QUOTES)));
		

		$icp_ciudad=mysqli_real_escape_string($con,(strip_tags($_POST["icp_ciudad"],ENT_QUOTES)));

		

		$icp_correo=mysqli_real_escape_string($con,(strip_tags($_POST["icp_correo"],ENT_QUOTES)));

		$icp_sitioweb=mysqli_real_escape_string($con,(strip_tags($_POST["icp_sitioweb"],ENT_QUOTES)));

		$icp_giro=mysqli_real_escape_string($con,(strip_tags($_POST["icp_giro"],ENT_QUOTES)));

		$icp_contacto=mysqli_real_escape_string($con,(strip_tags($_POST["icp_contacto"],ENT_QUOTES)));

		

		$sql="INSERT INTO ict_proveedor (icp_rut, icp_nombre, icp_nombrecontacto,icp_telefono, icp_celular, icp_direccion, icp_ciudad, icp_correo, icp_giro, icp_sitioweb, icp_contacto ) VALUES (

		

		'".$icp_rut."', 

		'".$icp_nombre."',

		

		'".$icp_nombrecontacto."',

		

		'".$icp_telefono."',  

		'".$icp_celular."',  

		'".$icp_direccion."',

		 

		'".$icp_ciudad."',

		

		'".$icp_correo."', 		

		'".$icp_giro."',		

		'".$icp_sitioweb."',

		'".$icp_contacto."'	

		)";

		

		//echo $sql;

		$query_update = mysqli_query($con,$sql);

			if ($query_update){

				$messages[] = "Los datos han sido guardados satisfactoriamente.";

			} else{

				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);

			}

		} else {

			$errors []= "Error desconocido.";

		}

		if (isset($errors)){

			?>

			<div class="alert alert-danger" role="alert">

				<button type="button" class="close" data-dismiss="alert">&times;</button>

					<strong>Error!</strong> 

					<?php

						foreach ($errors as $error) {

								echo $error;

							}

						?>

			</div>

			<?php

			}

			if (isset($messages)){

				?>

				<div class="alert alert-success" role="alert">

						<button type="button" class="close" data-dismiss="alert">&times;</button>

						<strong>¡Bien hecho!</strong>

						<?php

							foreach ($messages as $message) {

									echo $message;

								}

							?>

				</div>

				<?php

			}

?>	