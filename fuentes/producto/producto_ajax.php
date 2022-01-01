<?php

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//inventario
header("content-disposition: attachment;filename=producto.xls");

// $con=@mysqli_connect('localhost', 'root', '123456','inventario');

$con=@mysqli_connect('localhost', 'root', '123456','inventario');

if(!$con){
	die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
	die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}


	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

	if($action == 'ajax'){

		include 'pagination.php'; //incluir el archivo de paginación

		//las variables de paginación

		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;

		$per_page = 10; //la cantidad de registros que desea mostrar

		$adjacents  = 4; //brecha entre páginas después de varios adyacentes

		$offset = ($page - 1) * $per_page;

		//Cuenta el número total de filas de la tabla*/

		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_producto ");

		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$total_pages = ceil($numrows/$per_page);

		$reload = 'index.php';

		//consulta principal para recuperar los datos

		$query = mysqli_query($con,"SELECT * FROM ict_producto order by icp_id_producto LIMIT $offset,$per_page");

		if ($numrows>0){

			?>

		<div class="table-responsive">

        <table class="table table-bordered">

			<thead>

				<tr>

				  <th>Acciones</th>

				  <th></th>

                  <th>CÓDIGO</th>

                  <th>TIPO SUBVENCIÓN</th>

                  <th>NOMBRE</th>

				  <th>TIPO DE DOCUMENTO</th>

                  <th>N° DOCUMENTO</th>

                  <th>FECHA DOCUMENTO</th>                 

				  <th>FECHA PAGO</th>

                  <th>DESCRIPCIÓN GASTO</th>

                  <th>RUT PROVEEDOR</th>

                  <th>NOMBRE PROVEEDOR</th>

                  <th>MONTO GASTO</th>

				  <th>MONTO DOCUMENTO</th>

                  <th>DOCUMENTO</th>

				  <th>CATEGORÍA</th>

                  <th>SUBCATEGORÍA</th>

				  <th>ACCIÓN</th>

                  <th>ESTADO DEL PRODUCTO</th>

				  <th>FECHA DE RECEPCIÓN</th>

                  <th>UBICACIÓN FÍSICA</th>

				  <th>FECHA DE BAJA</th>

                  <th>RESPONSABLE</th> 

                </tr>

			</thead>

			<tbody>

			<?php

			while($row = mysqli_fetch_array($query)){

				?>

				<tr>

					<td>

						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" 

						data-icp_id_producto="<?php echo $row['icp_id_producto']?>" 

						data-icprod_codigo="<?php echo $row['icprod_codigo']?>"

						data-icprod_tipo_subvencion="<?php echo $row['icprod_tipo_subvencion']?>"		                       

                        data-icprod_producto="<?php echo $row['icprod_producto']?>" 

                        data-icprod_tipo_doc="<?php echo $row['icprod_tipo_doc']?>"

						data-icprod_numero_doc="<?php echo $row['icprod_numero_doc']?>"

                        data-icprod_fecha_compra="<?php echo $row['icprod_fecha_compra']?>"

						data-icprod_fecha_pago="<?php echo $row['icprod_fecha_pago']?>" 

                        data-icprod_comentarios="<?php echo $row['icprod_comentarios']?>" 

                        data-icprod_proveedor="<?php echo $row['icprod_proveedor']?>"

                        data-icprod_precio="<?php echo $row['icprod_precio']?>" 

						data-icprod_cantidad="<?php echo $row['icprod_cantidad']?>" 

						data-icprod_tipo_pago="<?php echo $row['icprod_tipo_pago']?>"

						data-icprod_tipo_categoria="<?php echo $row['icprod_tipo_categoria']?>"

                        data-icprod_tipo_subcategoria="<?php echo $row['icprod_tipo_subcategoria']?>"

						data-icprod_accion="<?php echo $row['icprod_accion']?>"

						data-icprod_estado_producto="<?php echo $row['icprod_estado_producto']?>"						

						data-icprod_fecha_recepcion="<?php echo $row['icprod_fecha_recepcion']?>" 

                        data-icprod_ubicacion="<?php echo $row['icprod_ubicacion']?>"  

						data-icprod_fecha_baja="<?php echo $row['icprod_fecha_baja']?>"						

						data-icprod_nom_responsable="<?php echo $row['icprod_nom_responsable']?>"  									

						

						<i class='glyphicon glyphicon-edit'></i> Modificar</button>

					</td>				

                    <td>

						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-icp_id_producto="<?php echo $row['icp_id_producto']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>

					</td>

					

                    <td><?php echo $row['icprod_codigo'];?></td> <!--CÓDIGO-->

                    <td><!--TIPO SUBVENCIÓN-->

						<?php 

							$icp_id_tiposubvencion=intval($row['icprod_tipo_subvencion']);

							$sqlprov3= mysqli_query($con,"select ictiposubvencion FROM ict_tiposubvencion WHERE icp_id_tiposubvencion='$icp_id_tiposubvencion'");

							if ($rowProv3= mysqli_fetch_array($sqlprov3)){

							echo $rowProv3['ictiposubvencion'];}

						?>

                    </td>

                    <td><?php echo $row['icprod_producto'];?></td><!--NOMBRE PRODUCTO-->

                    <td><!--TIPO DOCUMENTO-->

                    	<?php 

							$icp_id_documentos=intval($row['icprod_tipo_doc']);

							$sqlprov1= mysqli_query($con,"select ictipodocumento FROM ict_tipodocumentos WHERE icp_id_documentos='$icp_id_documentos'");

							if ($rowProv1= mysqli_fetch_array($sqlprov1)){

							echo $rowProv1['ictipodocumento'];}

						?>

                    </td>

                    <td><?php echo $row['icprod_numero_doc'];?></td><!--NUMERO DOCUMENTO-->

                    <td><?php echo $row['icprod_fecha_compra'];?></td><!--FECHA COMPRA-->                    

                    <td><?php echo $row['icprod_fecha_pago'];?></td><!--FECHA DE PAGO-->                    

                    <td><?php echo $row['icprod_comentarios'];?></td><!--DESCRIPCIÓN DE GASTO-->

                    

                    <td><!--RUT PROVEEDOR-->

						<?php 

						   //id del que necesito, icnombredelcampoenproducto

							$icp_id_proveedor=intval($row['icprod_proveedor']);

							//variable contenedora, select nombreARescatar

							$sqlprov= mysqli_query($con,"select icp_rut FROM ict_proveedor WHERE icp_id_proveedor='$icp_id_proveedor'");

							if ($rowProv= mysqli_fetch_array($sqlprov)){

							echo $rowProv['icp_rut'];}

						?>

					

					</td>                    

                    <td><!--NOMBRE PROVEEDOR-->

						<?php 

						   //id del que necesito, icnombredelcampoenproducto

							$icp_id_proveedor=intval($row['icprod_proveedor']);

							//variable contenedora, select nombreARescatar

							$sqlprov= mysqli_query($con,"select icp_nombre FROM ict_proveedor WHERE icp_id_proveedor='$icp_id_proveedor'");

							if ($rowProv= mysqli_fetch_array($sqlprov)){

							echo $rowProv['icp_nombre'];}

						?>

					</td>                                        

					<td><?php echo $row['icprod_precio'];?></td><!--MONTO GASTO-->

					<td><?php echo $row['icprod_cantidad'];?></td><!--MONTO DOCUMENTO-->

					<td><!--DOCUMENTO-->

                    	<?php 

							$icp_id_tipopago=intval($row['icprod_tipo_pago']);

							$sqlprov2= mysqli_query($con,"select ictipopago FROM ict_tipopago WHERE icp_id_tipopago='$icp_id_tipopago'");

							if ($rowProv2= mysqli_fetch_array($sqlprov2)){

							echo $rowProv2['ictipopago'];}

						?>

                    </td>

					 <td><!--CATEGORIA-->

						<?php 

						   //id del que necesito, icnombredelcampoenproducto

							$icp_id_categorias=intval($row['icprod_tipo_categoria']);

							//variable contenedora, select nombreARescatar

				$sqlprov4= mysqli_query($con,"select iccategoriasnombre FROM ict_categorias WHERE icp_id_categorias='$icp_id_categorias'");

							if ($rowProv4= mysqli_fetch_array($sqlprov4)){

							echo $rowProv4['iccategoriasnombre'];}

						?>

                    </td>

                    <td><!--SUBCATEGORIA-->

						<?php 

						   //id del que necesito, icnombredelcampoenproducto

							$icp_id_subcategorias=intval($row['icprod_tipo_subcategoria']);

							//variable contenedora, select nombreARescatar

							$sqlprov5= mysqli_query($con,"select icsubcategoriasnombre FROM ict_subcategorias WHERE icp_id_subcategorias='$icp_id_subcategorias'");

							if ($rowProv5= mysqli_fetch_array($sqlprov5)){

							echo $rowProv5['icsubcategoriasnombre'];}

						?>

                    </td>

					<td><?php echo $row['icprod_accion'];?></td> <!--ACCION-->

					<td><?php echo $row['icprod_estado_producto'];?></td>

                    <td><?php echo $row['icprod_fecha_recepcion'];?></td>

                    <td><?php echo $row['icprod_ubicacion'];?></td>

					<td><?php echo $row['icprod_fecha_baja'];?></td>

                    <td><?php echo $row['icprod_nom_responsable'];?></td>				

											

				</tr>

				<?php

			}

			?>

			</tbody>

		</table>

        </div>

		<div class="table-pagination pull-right">

			<?php echo paginate($reload, $page, $total_pages, $adjacents);?>

		</div>

			<?php

		} else {

			?>

			<div class="alert alert-warning alert-dismissable">

              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

              <h4>Aviso!!!</h4> No hay datos para mostrar

            </div>

			<?php

		}

	}

?>