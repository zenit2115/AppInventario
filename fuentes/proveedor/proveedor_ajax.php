<?php
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

		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_proveedor ");

		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$total_pages = ceil($numrows/$per_page);

		$reload = 'index.php';

		//consulta principal para recuperar los datos

		$query = mysqli_query($con,"SELECT * FROM ict_proveedor  order by icp_id_proveedor LIMIT $offset,$per_page");

		

		if ($numrows>0){

			?>

        <div class="table-responsive">

		<table class="table table-bordered">

			  <thead>

				<tr>

				  <th>Acciones</th>

				  <th></th>

				  <th>RUT</th>

				  <th>NOMBRE</th>

                  

                  <th>NOMBRE CONTACTO</th>

                  

				  <th>TELÉFONO FIJO</th>

				  <th>CELULAR</th>

				  <th>DIRECCIÓN</th>

                  

                  <th>CIUDAD</th>

                  

				  <th>E-Mail</th>

				  <th>SITIO WEB</th>

				  <th>GIRO</th>

				  <th>DATOS CONTACTO</th>

				</tr>

			</thead>

			<tbody>

			<?php

			while($row = mysqli_fetch_array($query)){

				?>

				<tr>

					<td>

						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" 

						data-icp_id_proveedor="<?php echo $row['icp_id_proveedor']?>" 

						data-icp_rut="<?php echo $row['icp_rut']?>" 

						data-icp_nombre="<?php echo $row['icp_nombre']?>"                         

                        data-icp_nombrecontacto="<?php echo $row['icp_nombrecontacto']?>"                         

						data-icp_telefono="<?php echo $row['icp_telefono']?>"

						data-icp_celular="<?php echo $row['icp_celular']?>"

						data-icp_direccion="<?php echo $row['icp_direccion']?>"                        

                        data-icp_ciudad="<?php echo $row['icp_ciudad']?>"                        

						data-icp_correo="<?php echo $row['icp_correo']?>"

						data-icp_sitioweb="<?php echo $row['icp_sitioweb']?>"

						data-icp_giro="<?php echo $row['icp_giro']?>"

						data-icp_contacto="<?php echo $row['icp_contacto']?>">

						<i class='glyphicon glyphicon-edit'></i> Modificar</button>

					</td>				

					<td>

						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-icp_id_proveedor="<?php echo $row['icp_id_proveedor']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>

					</td>				

					<td><?php echo $row['icp_rut'];?></td>

					<td><?php echo $row['icp_nombre'];?></td>

                    

                    <td><?php echo $row['icp_nombrecontacto'];?></td>

                    

					<td><?php echo $row['icp_telefono'];?></td>			

					<td><?php echo $row['icp_celular'];?></td>				

					<td><?php echo $row['icp_direccion'];?></td>

                    

                    <td><?php echo $row['icp_ciudad'];?></td>

                    

					<td><?php echo $row['icp_correo'];?></td>			

					<td><?php echo $row['icp_sitioweb'];?></td>

					<td><?php echo $row['icp_giro'];?></td>

					<td><?php echo $row['icp_contacto'];?></td>

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

