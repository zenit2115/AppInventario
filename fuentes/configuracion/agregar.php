<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');
    if(!$con){

        die("imposible conectarse: ".mysqli_error($con));

    }

    if (@mysqli_connect_errno()) {

        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

    }

	/*Inicia validacion del lado del servidor*/

	 if (empty($_POST['icconfiguracion_rut'])){

			$errors[] = "RUT vacío";

		} else if (empty($_POST['icconfiguracion_nombre'])){

			$errors[] = "icp_nombre vacío";

			

		}   else if (

			!empty($_POST['icconfiguracion_rut']) && 

			!empty($_POST['icconfiguracion_nombre'])

		){

		// escaping, additionally removing everything that could be (html/javascript-) code

		$icconfiguracion_rut=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_rut"],ENT_QUOTES)));

		$icconfiguracion_nombre=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_nombre"],ENT_QUOTES)));

		$icconfiguracion_direccion=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_direccion"],ENT_QUOTES)));

		$icconfiguracion_telefono1=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_telefono1"],ENT_QUOTES)));		

		$icconfiguracion_cedula=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_cedula"],ENT_QUOTES)));

		$icconfiguracion_nombredirector=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_nombredirector"],ENT_QUOTES)));

		$icconfiguracion_apellidodirector=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_apellidodirector"],ENT_QUOTES)));

		$icconfiguracion_email=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_email"],ENT_QUOTES)));

		$icconfiguracion_telefono2=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_telefono2"],ENT_QUOTES)));

		$icconfiguracion_telefono3=mysqli_real_escape_string($con,(strip_tags($_POST["icconfiguracion_telefono3"],ENT_QUOTES)));

		

		

		$sql="INSERT INTO ict_configuracion (icconfiguracion_rut, icconfiguracion_nombre, icconfiguracion_direccion, icconfiguracion_telefono1, icconfiguracion_cedula, icconfiguracion_nombredirector, icconfiguracion_apellidodirector,icconfiguracion_email, icconfiguracion_telefono2, icconfiguracion_telefono3) 

		

		VALUES (

		

		'".$icconfiguracion_rut."', 

		'".$icconfiguracion_nombre."',

		'".$icconfiguracion_direccion."',  

		'".$icconfiguracion_telefono1."',  

		'".$icconfiguracion_cedula."', 

		'".$icconfiguracion_nombredirector."', 		

		'".$icconfiguracion_apellidodirector."',		

		'".$icconfiguracion_email."',

		'".$icconfiguracion_telefono2."',

		'".$icconfiguracion_telefono3."'

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