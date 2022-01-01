<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');
    if(!$con){

        die("imposible conectarse: ".mysqli_error($con));

    }

    if (@mysqli_connect_errno()) {

        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

    }

	/*Inicia validacion del lado del servidor*/

	 if (empty($_POST['icp_id_tipopago'])){

            $errors[] = "ID vacío";

        } else if (empty($_POST['ictipopago'])){

			$errors[] = "Nombre vacío";

		}   else if (

			!empty($_POST['icp_id_tipopago']) &&

			!empty($_POST['ictipopago'])

		){



		// escaping, additionally removing everything that could be (html/javascript-) code

		$ictipopago=mysqli_real_escape_string($con,(strip_tags($_POST["ictipopago"],ENT_QUOTES)));

		

		$icp_id_tipopago=intval($_POST['icp_id_tipopago']);

		

		$sql="UPDATE ict_tipopago SET  

		ictipopago='".$ictipopago."' 

		WHERE icp_id_tipopago ='".$icp_id_tipopago."'";

		

		

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