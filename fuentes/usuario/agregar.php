<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');

    if(!$con){

        die("imposible conectarse: ".mysqli_error($con));

    }

    if (@mysqli_connect_errno()) {

        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

    }

	/*Inicia validacion del lado del servidor*/

	 if (empty($_POST['icusuario_nombre'])){

			$errors[] = "Nombre Vacío";

		} else if (empty($_POST['icusuario_apellido'])){

			$errors[] = "Apellido Usuario Vacío";

					

		}   else if (

			!empty($_POST['icusuario_nombre']) && 

			!empty($_POST['icusuario_apellido'])

		){

		// escaping, additionally removing everything that could be (html/javascript-) code

		// Creo una variable donde guardo lo que se anote en la caja de texto del formulario

		$icusuario_nombre=mysqli_real_escape_string($con,(strip_tags($_POST["icusuario_nombre"],ENT_QUOTES)));

		$icusuario_apellido=mysqli_real_escape_string($con,(strip_tags($_POST["icusuario_apellido"],ENT_QUOTES)));

		$icusuario_email=mysqli_real_escape_string($con,(strip_tags($_POST["icusuario_email"],ENT_QUOTES)));

		$icusuario_telefono=mysqli_real_escape_string($con,(strip_tags($_POST["icusuario_telefono"],ENT_QUOTES)));

		$icusuario_clave=mysqli_real_escape_string($con,(strip_tags($_POST["icusuario_clave"],ENT_QUOTES)));

		$icusuario_tipousuario=mysqli_real_escape_string($con,(strip_tags($_POST["icusuario_tipousuario"],ENT_QUOTES)));

				

		//Creo el query: insertar en nombre de tabla (nombre de los campos de la tabla usuarios) values(nombre de las variables creadas anteriormente)

		$sql="INSERT INTO ict_usuarios (nombre, apellido, correoElectronico, telefono, contrasena, tipoUsuario) VALUES (

		'".$icusuario_nombre."',

		'".$icusuario_apellido."',

		'".$icusuario_email."',

		'".$icusuario_telefono."',

		'".$icusuario_clave."',

		'".$icusuario_tipousuario."'

		 	)";

			

		

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