<?php

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

		//Cuenta el número total de filas de la tabla*/ cambie ict_producto por ict_usuarios

		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_usuarios ");

		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$total_pages = ceil($numrows/$per_page);

		$reload = 'index.php';

   //consulta principal para recuperar los datos  cambie ict_producto por ict_usuarios order by apellido en vez de icp_id_producto

		$query = mysqli_query($con,"SELECT * FROM ict_usuarios order by icp_id_usuario LIMIT $offset,$per_page");

		if ($numrows>0){

			?>

		<div class="table-responsive">

        <table class="table table-bordered">

			<thead>

				<tr>

				  <th>Acciones</th>

				  <th></th>

				  <th>NOMBRE</th>

				  <th>APELLIDO</th>

				  <th>TELÉFONO</th>

				  <th>EMAIL</th>

				  <th>CONTRASEÑA</th>

				  <th>TIPO DE USUARIO</th>

				</tr>

			</thead>

			<tbody>

			<?php

			while($row = mysqli_fetch_array($query)){

				?>

				<tr>

					<td>

						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate"

                        data-icp_id_usuario="<?php echo $row['icp_id_usuario']?>" 

						data-nombre="<?php echo $row['nombre']?>" 

						data-apellido="<?php echo $row['apellido']?>" 

						data-telefono="<?php echo $row['telefono']?>" 						

						data-correoElectronico="<?php echo $row['correoElectronico']?>" 

						data-contrasena="<?php echo $row['contrasena']?>" 

						data-tipoUsuario="<?php echo $row['tipoUsuario']?>"

						<i class='glyphicon glyphicon-edit'></i> Modificar</button>

					</td>				

                    <td>

                    <!--cambie icp_id_producto por correoElectronico-->

						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-icp_id_usuario="<?php echo $row['icp_id_usuario']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>

					</td>				

                    <td><?php echo $row['nombre'];?></td>

					<td><?php echo $row['apellido'];?></td>					

					<td><?php echo $row['telefono'];?></td>

					<td><?php echo $row['correoElectronico'];?></td>

					<td><?php echo $row['contrasena'];?></td>

					<td><?php echo $row['tipoUsuario'];?></td>

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