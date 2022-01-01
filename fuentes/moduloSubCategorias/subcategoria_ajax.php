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

		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_subcategorias");

		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$total_pages = ceil($numrows/$per_page);

		$reload = 'index.php';

		//consulta principal para recuperar los datos

		$query = mysqli_query($con,"SELECT * FROM ict_subcategorias  order by icp_id_subcategorias LIMIT $offset,$per_page");

		

		if ($numrows>0){

			?>

        <div class="table-responsive">

		<table class="table table-bordered">

			  <thead>

				<tr>

				  <th>Acciones</th>

				  <th></th>

				  <th>SUBCATEGORIA</th>

				  <th>CATEGORIA</th>

				</tr>

			</thead>

			<tbody>

			<?php

			while($row = mysqli_fetch_array($query)){

				?>

				<tr>

					<td>

						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" 

						data-icp_id_subcategorias="<?php echo $row['icp_id_subcategorias']?>" 

						data-icsubcategoriasnombre="<?php echo $row['icsubcategoriasnombre']?>" 

						data-icp_id_categorias="<?php echo $row['icp_id_categorias']?>" 

			

						<i class='glyphicon glyphicon-edit'></i> Modificar</button>

					</td>				

					<td>

						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-icp_id_subcategorias="<?php echo $row['icp_id_subcategorias']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>

					</td>				

					<td><?php echo $row['icsubcategoriasnombre'];?></td>

                    

                    <td>

						<?php 

						   //id del que necesito, icnombredelcampoenproducto

							$icp_id_categorias=intval($row['icp_id_categorias']);

							//variable contenedora, select nombreARescatar

				$sqlprov4= mysqli_query($con,"select iccategoriasnombre FROM ict_categorias WHERE icp_id_categorias='$icp_id_categorias'");

							if ($rowProv4= mysqli_fetch_array($sqlprov4)){

							echo $rowProv4['iccategoriasnombre'];}

						?>

                    </td>

			

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

