<?php
require("../../acciones/conexion_.php");
$con = conectar_();


// $con=@mysqli_connect('localhost', 'root', '123456','inventario');

    if(!$con){

        die("imposible conectarse: ".mysqli_error($con));

    }

    if (@mysqli_connect_errno()) {

        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

    }

	/*Inicia validacion del lado del servidor*/

	 if (empty($_POST['icprod_codigo'])){

			$errors[] = "Código Vacío";

		} else if (empty($_POST['icprod_producto'])){

			$errors[] = "Nombre Producto Vacío";

					

		}   else if (

			!empty($_POST['icprod_codigo']) && 

			!empty($_POST['icprod_producto'])

		){

		// escaping, additionally removing everything that could be (html/javascript-) code

		$icprod_codigo=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_codigo"],ENT_QUOTES)));

		$icprod_tipo_subvencion=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_tipo_subvencion"],ENT_QUOTES)));	

		$icprod_producto=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_producto"],ENT_QUOTES)));

		$icprod_tipo_doc=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_tipo_doc"],ENT_QUOTES)));

		$icprod_numero_doc=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_numero_doc"],ENT_QUOTES)));

		$icprod_fecha_compra=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_fecha_compra"],ENT_QUOTES)));

		$icprod_fecha_pago=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_fecha_pago"],ENT_QUOTES)));

		$icprod_comentarios=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_comentarios"],ENT_QUOTES)));

		$icprod_proveedor=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_proveedor"],ENT_QUOTES)));		

		$icprod_precio=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_precio"],ENT_QUOTES)));

		$icprod_cantidad=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_cantidad"],ENT_QUOTES)));		

		$icprod_tipo_pago=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_tipo_pago"],ENT_QUOTES)));

		$icprod_tipo_categoria=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_tipo_categoria"],ENT_QUOTES)));

		$icprod_tipo_subcategoria=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_tipo_subcategoria"],ENT_QUOTES)));

        $icprod_accion=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_accion"],ENT_QUOTES)));

		$icprod_estado_producto=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_estado_producto"],ENT_QUOTES)));

		$icprod_fecha_recepcion=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_fecha_recepcion"],ENT_QUOTES)));		

		$icprod_ubicacion=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_ubicacion"],ENT_QUOTES)));				

		$icprod_fecha_baja=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_fecha_baja"],ENT_QUOTES)));

		$icprod_nom_responsable=mysqli_real_escape_string($con,(strip_tags($_POST["icprod_nom_responsable"],ENT_QUOTES)));		

		

		$icp_id_producto=intval($_POST['icp_id_producto']);



		$sql="UPDATE ict_producto SET  

		icprod_codigo='".$icprod_codigo."',

		icprod_tipo_subvencion='".$icprod_tipo_subvencion."',			

		icprod_producto='".$icprod_producto."',

		icprod_tipo_doc='".$icprod_tipo_doc."',

		icprod_numero_doc='".$icprod_numero_doc."',

		icprod_fecha_compra='".$icprod_fecha_compra."', 

		icprod_fecha_pago='".$icprod_fecha_pago."', 

		icprod_comentarios='".$icprod_comentarios."',

		icprod_proveedor='".$icprod_proveedor."',

		icprod_precio='".$icprod_precio."',				

		icprod_cantidad='".$icprod_cantidad."', 

		icprod_tipo_pago='".$icprod_tipo_pago."',

		icprod_tipo_categoria='".$icprod_tipo_categoria."',

		icprod_tipo_subcategoria='".$icprod_tipo_subcategoria."',

		icprod_accion='".$icprod_accion."', 

		icprod_estado_producto='".$icprod_estado_producto."',

		icprod_fecha_recepcion='".$icprod_fecha_recepcion."', 

		icprod_ubicacion='".$icprod_ubicacion."',	

		icprod_fecha_baja='".$icprod_fecha_baja."', 

		icprod_nom_responsable='".$icprod_nom_responsable."'

		

		WHERE icp_id_producto ='".$icp_id_producto."'";

		

//echo $sql;

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