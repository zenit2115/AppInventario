<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');
    if(!$con){

        die("imposible conectarse: ".mysqli_error($con));

    }

    if (@mysqli_connect_errno()) {

        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

    }

	/*Inicia validacion del lado del servidor*/

	 if (empty($_POST['icp_id_documentos'])){

			$errors[] = "ID vacío";

		}   else if (

			!empty($_POST['icp_id_documentos']) 

			

		){



		// escaping, additionally removing everything that could be (html/javascript-) code

		$icp_id_documentos=intval($_POST['icp_id_documentos']);

		

		$sql="DELETE FROM ict_tipodocumentos WHERE icp_id_documentos='".$icp_id_documentos."'";

		$query_delete = mysqli_query($con,$sql);

			if ($query_delete){

				$messages[] = "Los datos han sido eliminados satisfactoriamente.";

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