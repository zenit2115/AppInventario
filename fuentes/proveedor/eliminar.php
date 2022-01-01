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
		}   else if (
			!empty($_POST['icp_id_proveedor']) 
		){

		$icp_id_proveedor=intval($_POST['icp_id_proveedor']);
		$sql="DELETE FROM ict_proveedor WHERE icp_id_proveedor='".$icp_id_proveedor."'";

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