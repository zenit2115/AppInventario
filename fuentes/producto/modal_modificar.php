<!-- MODAL MODIFICAR PRODUCTO -->
<?php
require("../../acciones/conexion_.php");
$conn = conectar_();

?>

<form id="actualidarDatos">

<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">Modificar producto:</h4>

      </div>

      <div class="modal-body">

			<div id="datos_ajax"></div>

				<div class="form-group">
inventario
					<label for="icprod_codigo" class=" control-label">CÓDIGO PRODUCTO</label>

					<input type="hidden" class="form-control" id="icp_id_producto" name="icp_id_producto">

				      <input type="text" name="icprod_codigo" class="form-control" id="icprod_codigo" placeholder="Código de Producto" maxlength="13" 

                      rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[0-9]{1,13}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el CÓDIGO DEL PRODUCTO de 13 dígitos">

				</div> 

                

                <div class="form-group">

					<label for="icprod_tipo_subvencion" class=" control-label">TIPO SUBVENCIÓN</label>

				

				<?php

					////////$conn=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

					if(!$conn){

						die("imposible conectarse: ".mysqli_error($conn));

					}

					if (@mysqli_connect_errno()) {

						die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

					}

					//consulta principal para recuperar los datos

					$count_query   = mysqli_query($conn,"SELECT count(*) AS numrows FROM ict_tiposubvencion ");

					if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

					//Order by era  icp_id_tiposubvencion
					$query = mysqli_query($conn,"SELECT * FROM ict_tiposubvencion order by ictiposubvencion");

					if ($numrows>0){

						?>

					<select name="icprod_tipo_subvencion" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_subvencion" >

							<option value="0">SELECCIONE</option>

						<?php

						while($row = mysqli_fetch_array($query)){

						?>

							<option value="<?php echo $row['icp_id_tiposubvencion']?>" >

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
inventario
					<label for="icprod_tipo_doc" class="control-label">TIPO DE DOCUMENTO</label>

				

				<?php

					//////$conn=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

					if(!$conn){

						die("imposible conectarse: ".mysqli_error($conn));

					}

					if (@mysqli_connect_errno()) {

						die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

					}

					//consulta principal para recuperar los datos

					$count_query   = mysqli_query($conn,"SELECT count(*) AS numrows FROM ict_tipodocumentos");

					if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

					//Order by era icp_id_documentos

					$query = mysqli_query($conn,"SELECT * FROM ict_tipodocumentos order by ictipodocumento");

					if ($numrows>0){

						?>

						<select name="icprod_tipo_doc" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_doc" >

							<option value="0">SELECCIONE</option>

						<?php

						while($row = mysqli_fetch_array($query)){

						?>

							<option value="<?php echo $row['icp_id_documentos']?>" >

								<?php echo $row['ictipodocumento']; ?>

							</option>	inventario

							

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

				      <input type="text" name="icprod_numero_doc" class="form-control" id="icprod_numero_doc" placeholder="Número de Documento" maxlength="13"  rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9]{1,13}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega sólo números, del tipo 000213563">

                </div>

                

                <div class="form-group">

                    <label for="icprod_fecha_compra" class=" control-label">FECHA DE COMPRA</label>
inventario
                        <input type="date" min="2016-01-01"  max="3000-01-01" class="form-control" id="icprod_fecha_compra" name="icprod_fecha_compra" placeholder="Fecha de Compra">

                </div>

                <div class="form-group"><!--Fecha Pago-->

                    <label for="icprod_fecha_pago" class=" control-label">FECHA PAGO</label>

                        <input type="date" min="2016-01-01"  max="3000-01-01" class="form-control" id="icprod_fecha_pago" name="icprod_fecha_pago" placeholder="Fecha de Pago">

                </div>

                 <div class="form-group">

                    <label for="icprod_comentarios" class=" control-label">COMENTARIOS</label>

                    <textarea name="icprod_comentarios" class="form-control" id="icprod_comentarios" cols="50" rows="5" maxlength="500" placeholder="Escriba sus comentarios" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{3,500}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Escriba sus COMENTARIOS respecto a la compra realizada"></textarea>  

                </div>  

                

                <div class="form-group">

					<label for="icprod_proveedor" class=" control-label">PROVEEDOR</label>

					<input type="hidden" class="form-control" id="icprod_proveedor_hidden" name="icprod_proveedor_hidden">

				<?php

					//$conn=@mysqli_connect('localhost', 'root', '123456','inventario');

					if(!$conn){

						die("imposible conectarse: ".mysqli_error($conn));

					}

					if (@mysqli_connect_errno()) {

						die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

					}

					//consulta principal para recuperar los datos

					$count_query   = mysqli_query($conn,"SELECT count(*) AS numrows FROM ict_proveedor ");

					if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

					//oreder by era icp_id_proveedor

					$query = mysqli_query($conn,"SELECT * FROM ict_proveedor order by icp_nombre");

					if ($numrows>0){

						?>

						<select name="icprod_proveedor" class="form-control chosen-select" style="width:280px;" id="icprod_proveedor" >

							<option value="0">SELECCIONE</option>

						<?php

						while($row = mysqli_fetch_array($query)){

						?>

							<option value="<?php echo $row['icp_id_proveedor']?>" >

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

				      <input type="text" name="icprod_precio" class="form-control" id="icprod_precio" placeholder="Precio Producto" maxlength="13" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[0-9\.]{1,17}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega sólo números" onkeyup = "puntitos(this,this.value.charAt(this.value.length-1))">

				</div> 

				<div class="form-group">

					<label for="icprod_cantidad" class=" control-label">MONTO DOCUMENTO</label>

				      <input type="text" name="icprod_cantidad" class="form-control" id="icprod_cantidad" placeholder="Cantidad Producto" maxlength="7" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[0-9\.]{1,9}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega sólo números" onkeyup = "puntitos(this,this.value.charAt(this.value.length-1))">

				</div> 

                

                <div class="form-group">

					<label for="icprod_tipo_pago" class="control-label">DOCUMENTO</label>



				<?php

					//////$conn=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

					if(!$conn){

						die("imposible conectarse: ".mysqli_error($conn));

					}

					if (@mysqli_connect_errno()) {

						die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

					}

					//consulta principal para recuperar los datos

					$count_query   = mysqli_query($conn,"SELECT count(*) AS numrows FROM ict_tipopago ");

					if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

					//Order by era icp_id_tipopago

					$query = mysqli_query($conn,"SELECT * FROM ict_tipopago order by ictipopago");

					if ($numrows>0){

						?>

						<select name="icprod_tipo_pago" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_pago" >

							<option value="0">SELECCIONE</option>

						<?php

						while($row = mysqli_fetch_array($query)){

						?>

							<option value="<?php echo $row['icp_id_tipopago']?>" >

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

					//////$conn=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

					if(!$conn){

						die("imposible conectarse: ".mysqli_error($conn));

					}

					if (@mysqli_connect_errno()) {

						die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

					}

					//consulta principal para recuperar los datos

					$count_query   = mysqli_query($conn,"SELECT count(*) AS numrows FROM ict_categorias ");

					if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

					//Order by era icp_id_categorias

					$query = mysqli_query($conn,"SELECT * FROM ict_categorias order by iccategoriasnombre");

					if ($numrows>0){

						?>

						<select name="icprod_tipo_categoria" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_categoria" >

							<option value="0">SELECCIONE</option>

						<?php

						while($row = mysqli_fetch_array($query)){

						?>

							<option value="<?php echo $row['icp_id_categorias']?>" >

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

					//////$conn=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');

					if(!$conn){

						die("imposible conectarse: ".mysqli_error($conn));

					}

					if (@mysqli_connect_errno()) {

						die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

					}

					//consulta principal para recuperar los datos

					$count_query   = mysqli_query($conn,"SELECT count(*) AS numrows FROM ict_subcategorias ");

					if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

					//Order by era icp_id_subcategorias

					$query = mysqli_query($conn,"SELECT * FROM ict_subcategorias order by icsubcategoriasnombre");

					if ($numrows>0){

						?>

				<select name="icprod_tipo_subcategoria" class="form-control chosen-select" style="width:280px;" id="icprod_tipo_subcategoria" >

							<option value="0">SELECCIONE</option>

						<?php

						while($row = mysqli_fetch_array($query)){

						?>

							<option value="<?php echo $row['icp_id_subcategorias']?>" >

								<?php echo $row['icsubcategoriasnombre']; ?>

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

				      <input type="text" name="icprod_ubicacion" class="form-control" id="icprod_ubicacion" placeholder="Ubicación Física" maxlength="100" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar la UBICACIÓN FÍSICA del Producto">

				</div>

				

                <div class="form-group">

                    <label for="icprod_fecha_baja" class=" control-label">FECHA DE BAJA</label>

                        <input type="date" min="2016-01-01"  max="3000-01-01" class="form-control" id="icprod_fecha_baja" name="icprod_fecha_baja" placeholder="Fecha de Baja">

                </div>

                

				<div class="form-group">

					<label for="icprod_nom_responsable" class=" control-label">RESPONSABLE</label>

				      <input type="text" name="icprod_nom_responsable" class="form-control" id="icprod_nom_responsable" placeholder=" Responsable" maxlength="100" rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debe agregar el detalle del RESPONSABLE">

				</div>                

		        

		</div>      

		<div class="modal-footer">

			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

			<button type="submit" class="btn btn-primary">Actualizar datos</button>

		</div>    

    </div>

  </div>

</div>

</form>