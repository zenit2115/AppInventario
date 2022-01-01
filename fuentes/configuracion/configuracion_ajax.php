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

		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_configuracion ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';

		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT * FROM ict_configuracion  order by icp_id_configuracion LIMIT $offset,$per_page");
		if ($numrows>0){
	?>
        <div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Acciones</th>
						<th></th>
						<th>RUT INSTITUCIÓN</th>
						<th>NOMBRE INSTITUCIÓN</th>
						<th>DIRECCIÓN</th>
						<th>TELÉFONO INSTITUCIÓN</th>				  
						<th>RUT DIRECTOR</th>
						<th>NOMBRE DIRECTOR</th>
						<th>APELLIDO DIRECTOR</th>
						<th>E-Mail</th>
						<th>TELÉFONO DIRECTOR</th>
						<th>TELÉFONO FIJO</th>
					</tr>
				</thead>
				<tbody>
				<?php
				while($row = mysqli_fetch_array($query)){
				?>
					<tr>
						<td>
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" 
							data-icp_id_configuracion="<?php echo $row['icp_id_configuracion']?>" 
							data-icconfiguracion_rut="<?php echo $row['icconfiguracion_rut']?>" 
							data-icconfiguracion_nombre="<?php echo $row['icconfiguracion_nombre']?>" 
							data-icconfiguracion_direccion="<?php echo $row['icconfiguracion_direccion']?>"
							data-icconfiguracion_telefono1="<?php echo $row['icconfiguracion_telefono1']?>"						
							data-icconfiguracion_cedula="<?php echo $row['icconfiguracion_cedula']?>"
							data-icconfiguracion_nombredirector="<?php echo $row['icconfiguracion_nombredirector']?>"						
							data-icconfiguracion_apellidodirector="<?php echo $row['icconfiguracion_apellidodirector']?>"
							data-icconfiguracion_email="<?php echo $row['icconfiguracion_email']?>"
							data-icconfiguracion_telefono2="<?php echo $row['icconfiguracion_telefono2']?>"
							data-icconfiguracion_telefono3="<?php echo $row['icconfiguracion_telefono3']?>"
							<i class='glyphicon glyphicon-edit'></i> Modificar</button>
						</td>				

						<td>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-icp_id_configuracion="<?php echo $row['icp_id_configuracion']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>
						</td>				
						<td><?php echo $row['icconfiguracion_rut'];?></td>
						<td><?php echo $row['icconfiguracion_nombre'];?></td>
						<td><?php echo $row['icconfiguracion_direccion'];?></td>
						<td><?php echo $row['icconfiguracion_telefono1'];?></td>
						<td><?php echo $row['icconfiguracion_cedula'];?></td>
						<td><?php echo $row['icconfiguracion_nombredirector'];?></td>
						<td><?php echo $row['icconfiguracion_apellidodirector'];?></td>
						<td><?php echo $row['icconfiguracion_email'];?></td>
						<td><?php echo $row['icconfiguracion_telefono2'];?></td>
						<td><?php echo $row['icconfiguracion_telefono3'];?></td>
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

