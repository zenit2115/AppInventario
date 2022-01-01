<!-- MODAL AGREGAR PRODUCTO -->
<?php
require("../../acciones/conexion.php");
$con = conectar();
?>

<form id="guardarDatos">

<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Agregar producto</h4>
			</div>
			<div class="modal-body">
				<div id="datos_ajax_register"></div>
				<div class="form-group">
					<label for="icprod_codigo" class=" control-label">CÓDIGO PRODUCTO</label>
					<select class="form-control chosen-select" style="width:280px;" id="icprod_lugar_pertenencia" name="icprod_lugar_pertenencia" >
						<option value="0" selected>Seleccione Lugar de Pertenencia...</option>
						<option value="1" >Centro</option>
						<option value="2" >Campus</option>
						<option value="3" >Escuela Especial</option>
					</select>

					<select class="form-control chosen-select" style="width:280px;" id="icprod_area_pertenencia" name="icprod_area_pertenencia" >
						<option value="0" selected>Seleccione Área de Pertenencia...</option>
						<option value="1" >Gestión Pedagogica</option>
						<option value="2" >Liderazgo Escolar</option>
						<option value="3" >Convivencia Escolar</option>
						<option value="4" >Gestión de Recursos</option>
					</select>

					<input type="month" min="2020-01-01"  style="width: 280px !important;"  max="3000-01-01" class="form-control" id="icprod_fecha_ingreso" name="icprod_fecha_ingreso" placeholder="Fecha de Ingreso">
					<br>
					<?php

					

					// $con=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

					if(!$con){
						die("imposible conectarse: ".mysqli_error($con));
					}
					if (@mysqli_connect_errno()) {
						die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
					}
					//consulta principal para recuperar los datos, desde tabla base de datos
					$count_query   = mysqli_query($con,"SELECT count(icp_id_producto) AS numrows FROM ict_producto");

					if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}				
					if ($numrows>0){
						$rs = mysqli_query($con,"SELECT MAX(icp_id_producto)+1 AS id FROM ict_producto");						
						if ($rows = mysqli_fetch_row($rs)) {
							$id = str_pad($rows[0], 5, "0", STR_PAD_LEFT);
						}							
					?>
								
					<input type="text" name="icprod_codigo" class="form-control" id="icprod_codigo" placeholder="Código de Producto" maxlength="13" value="<?php echo $id ?>" style="width:280px;"	rel="popover" data-container="body" data-toggle="popover" data-placement="right">

					<?php		 
						} else{ 
					?>
					<input type="text" name="icprod_codigo" class="form-control" id="icprod_codigo" placeholder="Código de Producto" maxlength="13" value="00001" style="width:280px;"	rel="popover" data-container="body" data-toggle="popover" data-placement="right">	
					<?php
						}
					?>
				</div> 
				<div class="form-group">
					<label for="icprod_tipo_subvencion" class=" control-label">TIPO SUBVENCIÓN</label>
					<?php

					// $con=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');
					if(!$con){
						die("imposible conectarse: ".mysqli_error($con));
					}
					if (@mysqli_connect_errno()) {
						die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
					}

					//consulta principal para recuperar los datos, desde tabla base de datos
					$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_tiposubvencion");
					if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
					//Seleccionar desde tabla base de datos ordenar por id era icp_id_tiposubvencion
					$query = mysqli_query($con,"SELECT * FROM ict_tiposubvencion order by ictiposubvencion");
					if ($numrows>0){
						?>
						<!--name="icprod_tipo_doc" e id los utilizare para guardar los datos y actualizarlos-->
					<select name="icprod_tipo_subvencion" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_subvencion">
						<option value="0" selected>Seleccione Tipo de Subvencion</option>
						<?php
							while($row = mysqli_fetch_array($query)){
						?>
							<option value=" <?php echo $row['icp_id_tiposubvencion'] ?> " >
								<!--Nombre registro nombre de base de datos de documentos-->
								<?php echo $row['ictiposubvencion']; ?>
							</option>	
						<?php
							}
						?>
						</select>
				<?php		 
					}
				?>	
				</div>
				<div class="form-group">
					<label for="icprod_producto" class="control-label">NOMBRE PRODUCTO</label>
					<input type="text" name="icprod_producto" class="form-control" id="icprod_producto" placeholder="Nombre del Producto" maxlength="100" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el NOMBRE DEL PRODUCTO">
				</div>
						<div class="form-group">

							<label for="icprod_tipo_doc" class="control-label">TIPO DE DOCUMENTO</label>

						<?php

							//nombreServidor, nombreUsuario,contraseña,nombreBaseDatos
						
							// $con=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

							if(!$con){
								die("imposible conectarse: ".mysqli_error($con));

							}

							if (@mysqli_connect_errno()) {

								die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

							}

							//consulta principal para recuperar los datos, desde tabla base de datos

							$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_tipodocumentos");

							if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

							//Seleccionar desde tabla base de datos ordenar por id este era icp_id_documentos

							$query = mysqli_query($con,"SELECT * FROM ict_tipodocumentos order by ictipodocumento");

							if ($numrows>0){

								?>

								<!--name="icprod_tipo_doc" e id los utilizare para guardar los datos y actualizarlos-->

								<select name="icprod_tipo_doc" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_doc" >

									<option value="0" selected>Seleccione Tipo de Documento</option>

								<?php

								while($row = mysqli_fetch_array($query)){

								?>

									<option value="<?php echo $row['icp_id_documentos'] ?> " >

										<!--Nombre registro nombre de base de datos de documentos-->

										<?php 
										//echo $row['ictipodocumentoinventario']; //ESTO SE MODIFICÓ
										echo $row['ictipodocumento']; 
										?>

									</option>	

									

								<?php

								}

								?>

								</select>

						<?php		 

							}

						?>	 

						</div>

						

						<div class="form-group">

							<label for="icprod_numero_doc" class=" control-label">NÚMERO DOCUMENTO</label>

							<input type="text" name="icprod_numero_doc" class="form-control" id="icprod_numero_doc" placeholder="Número de Documento" maxlength="13" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9]{1,13}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega sólo números, del tipo 000213563">

						</div>

						

						

						<div class="form-group">

							<label for="icprod_finventarioss=" control-label">FECHA DOCUMENTO</label>							

								<input type="date" min="2016-01-01"  max="3000-01-01" class="form-control" id="icprod_fecha_compra" name="icprod_fecha_compra" placeholder="Fecha de Compra">						

						</div>    

						<div class="form-group">

							<label for="icprod_fecha_pago" class=" control-label">FECHA DE PAGO</label>							

								<input type="date" min="2016-01-01"  max="3000-01-01" class="form-control" id="icprod_fecha_pago" name="icprod_fecha_pago" placeholder="Fecha de Pago">						

						</div> 	

						<div class="form-group">

						<label for="icprod_comentarios" class=" control-label">DESCRIPCIÓN GASTOS</label>						

						<textarea name="icprod_comentarios" class="form-control" id="icprod_comentarios" cols="50" rows="5" maxlength="500" placeholder="Escriba sus comentarios" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{3,500}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Escriba sus COMENTARIOS respecto a la compra realizada"></textarea>  

						

						</div>

						

						<div class="form-group">

							<label for="icprod_proveedor" class=" control-label">PROVEEDOR</label>					

						<?php

							// $con=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

							if(!$con){

								die("imposible conectarse: ".mysqli_error($con));

							}

							if (@mysqli_connect_errno()) {

								die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

							}

							//consulta principal para recuperar los datos

							$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_proveedor ");

							if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

							//Order by era icp_id_proveedor

							$query = mysqli_query($con,"SELECT * FROM ict_proveedor order by icp_nombre");

							if ($numrows>0){

								?>

								<select name="icprod_proveedor" class="form-control chosen-select" id="icprod_proveedor" >

									<option value="0" selected>Seleccione Proveedor</option>

								<?php

								while($row = mysqli_fetch_array($query)){

								?>

									<option value=" <?php echo $row['icp_id_proveedor'] ?> " >

										<?php echo $row['icp_nombre']; ?>

									</option>	

									

								<?php

								}

								?>

								</select>

						<?php		 

							}

						?>						

						</div>

						

						<div class="form-group">

							<label for="icprod_precio" class=" control-label">MONTO GASTO</label>						

							<input type="text" name="icprod_precio" class="form-control" id="icprod_precio" placeholder="Ingrese Monto Gasto" maxlength="13"  

							rel="popover" data-container="body" data-toggle="popover" data-placement="right"   title="<img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega sólo números" onkeyup = "puntitos(this,this.value.charAt(this.value.length-1))">

							

						</div>

						

						<div class="form-group">

							<label for="icprod_cantidad" class=" control-label">MONTO DOCUMENTO</label>							

							<input type="text" name="icprod_cantidad" class="form-control" id="icprod_cantidad" placeholder="Ingrese Monto Documento" maxlength="13"  

							rel="popover" data-container="body" data-toggle="popover" data-placement="right"  title="<img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega sólo números" onkeyup = "puntitos(this,this.value.charAt(this.value.length-1))">

						

						</div> 

		

						<div class="form-group">

							<label for="icprod_tipo_pago" class="control-label">DOCUMENTO</label>

							

							<?php

							//nombreServidor, nombreUsuario,contraseña,nombreBaseDatos
						
							// $con=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

							if(!$con){

								die("imposible conectarse: ".mysqli_error($con));

							}

							if (@mysqli_connect_errno()) {

								die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

							}

							//consulta principal para recuperar los datos, desde tabla base de datos

							$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_tipopago");

							if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

							//Seleccionar desde tabla base de datos ordenar por id era icp_id_tipopago

							$query = mysqli_query($con,"SELECT * FROM ict_tipopago order by ictipopago");

							if ($numrows>0){

								?>

								<!--name="icprod_tipo_doc" e id los utilizare para guardar los datos y actualizarlos-->

								<select name="icprod_tipo_pago" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_pago" >

									<option value="0" selected>Seleccione Tipo de Documento</option>

								<?php

								while($row = mysqli_fetch_array($query)){

								?>

									<option value=" <?php echo $row['icp_id_tipopago'] ?> " >

										<!--Nombre registro nombre de base de datos de documentos-->

										<?php echo $row['ictipopago']; ?>

									</option>	

									

								<?php

								}

								?>

								</select>

						<?php		 

							}

						?>	

							

						</div>

						

						<!--CAMPOS NUEVOS DE CATEGORIA Y SUBCATEGORIA-->

						<div class="form-group">

							<label for="icprod_tipo_categoria" class=" control-label">CATEGORÍA</label>

							

							<?php

							//nombreServidor, nombreUsuario,contraseña,nombreBaseDatos
						
							// $con=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

							if(!$con){

								die("imposible conectarse: ".mysqli_error($con));

							}

							if (@mysqli_connect_errno()) {

								die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

							}

							//consulta principal para recuperar los datos, desde tabla base de datos

							$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_categorias");

							if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

							//Seleccionar desde tabla base de datos ordenar por id era icp_id_categorias

							$query = mysqli_query($con,"SELECT * FROM ict_categorias order by iccategoriasnombre");

							if ($numrows>0){

								?>

								<!--name="icprod_tipo_doc" e id los utilizare para guardar los datos y actualizarlos-->

							<select name="icprod_tipo_categoria" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_categoria">

									<option value="0" selected>Seleccione Tipo de Categoria</option>

								<?php

								while($row = mysqli_fetch_array($query)){

								?>

									<option value=" <?php echo $row['icp_id_categorias'] ?> " >

										<!--Nombre registro nombre de base de datos de documentos-->

										<?php echo $row['iccategoriasnombre']; ?>

									</option>	

									

								<?php

								}

								?>

								</select>

						<?php		 

							}

						?>	

						

						</div>

						

						<div class="form-group">

							<label for="icprod_tipo_subcategoria" class=" control-label">SUBCATEGORÍA</label>

							

							<?php

							//nombreServidor, nombreUsuario,contraseña,nombreBaseDatos
						
							// $con=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

							if(!$con){

								die("imposible conectarse: ".mysqli_error($con));

							}

							if (@mysqli_connect_errno()) {

								die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

							}

							//consulta principal para recuperar los datos, desde tabla base de datos

							$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_subcategorias");

							if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

							//Seleccionar desde tabla base de datos ordenar por id era icp_id_subcategorias

							$query = mysqli_query($con,"SELECT * FROM ict_subcategorias order by icsubcategoriasnombre");

							if ($numrows>0){

								?>

								<!--name="icprod_tipo_doc" e id los utilizare para guardar los datos y actualizarlos-->

							<select name="icprod_tipo_subcategoria" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_subcategoria">

									<option value="0" selected>Seleccione Tipo de Subcategoria</option>

								<?php

								while($row = mysqli_fetch_array($query)){

								?>

									<option value=" <?php echo $row['icp_id_subcategorias'] ?> " >

										<!--Nombre registro nombre de base de datos de documentos-->

										<?php echo $row['icsubcategoriasnombre']; ?>

									</option>	

									

								<?php

								}

								?>

								</select>

						<?php		 

							}

							mysqli_close($con);
						?>	

						

						</div>

						<!-- ACCION-->

						<div class="form-group">

							<label for="icprod_accion" class=" control-label">ACCIÓN</label>

							

							<input type="text" name="icprod_accion" class="form-control" id="icprod_accion" placeholder="Ingrese Acción" maxlength="100" >

							

						</div>				

						

						<div class="form-group">

							<label for="icprod_estado_producto" class=" control-label">ESTADO DEL PRODUCTO</label>

								<select name="icprod_estado_producto" class="form-control chosen-select" style="width:280px;" id="icprod_estado_producto" >

								<option value="0">SELECCIONE</option>

								<option value="De Baja">De Baja</option>

								<option value="De Salida">De Salida</option>

								<option value="En Reparacion Interna">En Reparacion Interna</option>

								<option value="En Reparacion Externa">En Reparacion Externa</option>

								<option value="Nuevo">Nuevo</option>

								</select>

						</div>

						

						<div class="form-group">

							<label for="icprod_fecha_recepcion" class=" control-label">FECHA DE RECEPCIÓN</label>							

								<input type="date" min="2016-01-01"  max="3000-01-01" class="form-control" id="icprod_fecha_recepcion" name="icprod_fecha_recepcion" placeholder="Fecha de Recepción">							

						</div>

						

						<div class="form-group">

							<label for="icprod_ubicacion" class=" control-label">UBICACIÓN FÍSICA</label>							

							<input type="text" name="icprod_ubicacion" class="form-control" id="icprod_ubicacion" placeholder="Ubicación Física" maxlength="100" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{1,100}$" title="<img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debe agregar la UBICACIÓN FÍSICA del Producto">						

						</div>



						<div class="form-group">

							<label for="icprod_fecha_baja" class=" control-label">FECHA DE BAJA</label>							

								<input type="date" min="2016-01-01"  max="3000-01-01" class="form-control" id="icprod_fecha_baja" name="icprod_fecha_baja" placeholder="Fecha de Baja">						

						</div>

						

						<div class="form-group">

							<label for="icprod_nom_responsable" class=" control-label">RESPONSABLE</label>							

							<input type="text" name="icprod_nom_responsable" class="form-control" id="icprod_nom_responsable" placeholder="Ingrese información del Responsable" maxlength="100" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{1,100}$" title="<img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debe agregar detalle del RESPONSABLE">						

						</div>					

			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-primary">Guardar datos</button>

			</div>
		</div>
	</div>
</div>

</form>

