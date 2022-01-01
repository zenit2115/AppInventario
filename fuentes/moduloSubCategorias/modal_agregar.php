<form id="guardarDatos">

<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">Agregar subcategoria</h4>

      </div>

      <div class="modal-body">

			<div id="datos_ajax_register"></div>

            

            
inventario
			  <div class="form-group">

				<label for="icsubcategoriasnombre" class="control-label">SUBCATEGORIA</label>

				      <input type="text" name="icsubcategoriasnombre" class="form-control" id="icsubcategoriasnombre" placeholder="Subcategoria" maxlength="100"   rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z-0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar la SUBCATEGORIA">

			  </div>

				

              

				<div class="form-group">

					<label for="icp_id_categorias" class=" control-label">TIPO CATEGORÍA</label>

                    

                    <?php

					//nombreServidor, nombreUsuario,contraseña,nombreBaseDatos

					//$con=@mysqli_connect('localhost', 'inventario', 'inventario01', 'abm');
					$con=@mysqli_connect('localhost', 'root', '123456','inventario');

					if(!$con){

						die("imposible conectarse: ".mysqli_error($con));

					}

					if (@mysqli_connect_errno()) {

						die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());

					}

					//consulta principal para recuperar los datos, desde tabla base de datos

					$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ict_categorias");

					if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

					//Seleccionar desde tabla base de datos ordenar por id

					$query = mysqli_query($con,"SELECT * FROM ict_categorias order by icp_id_categorias");

					if ($numrows>0){

						?>

                        <!--name="icprod_tipo_doc" e id los utilizare para guardar los datos y actualizarlos-->

					<select name="icp_id_categorias" class="form-control chosen-select" style="width:280px;" id="icp_id_categorias">

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

  

		</div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <button type="submit" class="btn btn-primary">Guardar datos</button>

      </div>

    </div>

  </div>

</div>

</form>

   <!-- <script src="../../public/js/jquery-1.11.2.min.js"></script>

	<script src="../../public/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../../public/js/jquery.Rut.js"></script>

<script type="text/javascript" src="../../public/js/jquery.Rut.min.js"></script>

	<script src="js/app.js"></script>

	<script src="../../public/js/javaScript.js"></script>

<script>

	$(document).ready(function(){

		load(1);

		$('#icp_rut').Rut();

	});

</script>-->

