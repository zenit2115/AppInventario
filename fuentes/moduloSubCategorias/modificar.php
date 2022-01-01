<?php
$con=@mysqli_connect('localhost', 'root', '123456','inventario');
    if(!$con){

        die("imposible conectarse: ".mysqli_error($con));

    }

    if (@mysqli_connect_errno()) {

        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

    }

	/*Inicia validacion del lado del servidor*/

	 if (empty($_POST['icp_id_subcategorias'])){

            $errors[] = "ID vacío";

        } else if (empty($_POST['icsubcategoriasnombre'])){

			$errors[] = "id categoria vacío";

		}   else if (

			!empty($_POST['icp_id_subcategorias']) &&

			!empty($_POST['icsubcategoriasnombre'])

		){



		// escaping, additionally removing everything that could be (html/javascript-) code

		$icsubcategoriasnombre=mysqli_real_escape_string($con,(strip_tags($_POST["icsubcategoriasnombre"],ENT_QUOTES)));

		$icp_id_categorias=mysqli_real_escape_string($con,(strip_tags($_POST["icp_id_categorias"],ENT_QUOTES)));

	

		

		$icp_id_subcategorias=intval($_POST['icp_id_subcategorias']);

		

		$sql="UPDATE ict_subcategorias SET  

		icsubcategoriasnombre='".$icsubcategoriasnombre."', 

		icp_id_categorias='".$icp_id_categorias."'

				

		WHERE icp_id_subcategorias ='".$icp_id_subcategorias."'";

		

		

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