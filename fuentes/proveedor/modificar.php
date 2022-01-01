<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');

    if(!$con){

        die("imposible conectarse: ".mysqli_error($con));

    }

    if (@mysqli_connect_errno()) {

        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

    }

	/*Inicia validacion del lado del servidor*/

	 if (empty($_POST['icp_id_proveedor'])){

            $errors[] = "ID vacío";

        } else if (empty($_POST['icp_ruta'])){

			$errors[] = "RUT vacío";

		}   else if (

			!empty($_POST['icp_id_proveedor']) &&

			!empty($_POST['icp_ruta'])

		){



		// escaping, additionally removing everything that could be (html/javascript-) code

		$icp_ruta=mysqli_real_escape_string($con,(strip_tags($_POST["icp_ruta"],ENT_QUOTES)));

		$icp_nombre=mysqli_real_escape_string($con,(strip_tags($_POST["icp_nombre"],ENT_QUOTES)));

		

		$icp_nombrecontacto=mysqli_real_escape_string($con,(strip_tags($_POST["icp_nombrecontacto"],ENT_QUOTES)));

		

		$icp_telefono=mysqli_real_escape_string($con,(strip_tags($_POST["icp_telefono"],ENT_QUOTES)));

		$icp_celular=mysqli_real_escape_string($con,(strip_tags($_POST["icp_celular"],ENT_QUOTES)));

		$icp_direccion=mysqli_real_escape_string($con,(strip_tags($_POST["icp_direccion"],ENT_QUOTES)));

		

		$icp_ciudad=mysqli_real_escape_string($con,(strip_tags($_POST["icp_ciudad"],ENT_QUOTES)));

		

		$icp_correo=mysqli_real_escape_string($con,(strip_tags($_POST["icp_correo"],ENT_QUOTES)));

		$icp_sitioweb=mysqli_real_escape_string($con,(strip_tags($_POST["icp_sitioweb"],ENT_QUOTES)));

		$icp_giro=mysqli_real_escape_string($con,(strip_tags($_POST["icp_giro"],ENT_QUOTES)));

		$icp_contacto=mysqli_real_escape_string($con,(strip_tags($_POST["icp_contacto"],ENT_QUOTES)));

		

		$icp_id_proveedor=intval($_POST['icp_id_proveedor']);

		

		$sql="UPDATE ict_proveedor SET  

		icp_rut='".$icp_ruta."', 

		icp_nombre='".$icp_nombre."',

		

		icp_nombrecontacto='".$icp_nombrecontacto."',

		

		icp_telefono='".$icp_telefono."', 

		icp_celular='".$icp_celular."',

		icp_direccion='".$icp_direccion."',

		

		icp_ciudad='".$icp_ciudad."',

		

		icp_correo='".$icp_correo."',

		icp_sitioweb='".$icp_sitioweb."',

		icp_giro='".$icp_giro."',

		icp_contacto='".$icp_contacto."' 

				

		WHERE icp_id_proveedor ='".$icp_id_proveedor."'";

		

		

		$query_update = mysqli_query($con,$sql);

			if ($query_update){

				$messages[] = "Los datos han sido actualizados satisfactoriamente.";

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