<form id="guardarDatos">

<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar proveedor</h4>
      </div>

      <div class="modal-body">
			<div id="datos_ajax_register"></div>

            

            

				<div class="form-group">
					<label for="icp_rut" class="control-label">RUT</label>
				    <input type="text" name="icp_rut" class="form-control" id="icp_rut" placeholder="RUT Proveedor" maxlength="12"  rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[0-9]{1,2}[\.]{1}[0-9]{3}[\.]{1}[0-9]{3}[-]{1}[0-9a-zA-Z]{1}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Debes agregar un RUT en este estilo, 51.123.456-1">
				</div>

                

			  <div class="form-group">
				<label for="icp_nombre" class="control-label">NOMBRE</label>
				  <input type="text" name="icp_nombre" class="form-control" id="icp_nombre" placeholder="Razón Social Proveedor" maxlength="100"   rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z-0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar la RAZÓN SOCIAL del proveedor">
			  </div>

        <div class="form-group">

				<label for="icp_nombrecontacto" class="control-label">NOMBRE CONTACTO</label>

				      <input type="text" name="icp_nombrecontacto" class="form-control" id="icp_nombrecontacto" placeholder="Nombre del contacto" maxlength="100"   rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z-0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el NOMBRE del contacto">

			  </div>

  

				<div class="form-group">

					<label for="icp_telefono" class="control-label">TELÉFONO FIJO </label>				    

				      <input type="text" name="icp_telefono" class="form-control" id="icp_telefono" placeholder="Teléfono Fijo Proveedor" maxlength="255" 

                      rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[;,-\w. ]{1,200}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega SOLO NÚMEROS, del tipo 452 123456">

				</div>  

    			

              <div class="form-group">

			  	<label for="icp_celular" class="control-label">CELULAR</label>

			  	<input type="text" name="icp_celular" class="form-control" id="icp_celular" placeholder="Teléfono Celular proveedor" maxlength="255"  

                      rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[;,-\w. ]{1,200}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega SOLO NÚMEROS, del tipo 569 12345678">				    

			  </div>

                     

                <div class="form-group">

                  <label for="icp_direccion" class="control-label">DIRECCIÓN </label>

                  <textarea name="icp_direccion" class="form-control" id="icp_direccion" cols="40" rows="5" placeholder="Escribe la dirección del proveedor" maxlength="200"  

                  rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{1,200}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega la DIRECCIÓN del Proveedor"></textarea>  

                </div>

                

                <div class="form-group">

					<label for="icp_ciudad" class="control-label">CIUDAD </label>

				      <input type="text" name="icp_ciudad" class="form-control" id="icp_ciudad" placeholder="Ciudad del Proveedor" maxlength="100" 

                      rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z-0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar la CIUDAD del proveedor">

				</div>

                

                <div class="form-group">

                	<!--pattern="^[-\w. ]{1,200}$"-->

                    <label for="icp_correo" class="control-label">E-MAIL</label>

                       <input type="text"  name="icp_correo" class="form-control" id="icp_correo" placeholder="Ingrese su E-mail" 

                        rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega un CORREO ELECTRÓNICO del tipo ejemplo@mimail.com">

                </div>  

     

                <div class="form-group">

					<label for="icp_sitioweb" class="control-label">SITIO WEB</label>

				      <input type="text" name="icp_sitioweb" class="form-control" id="icp_sitioweb" placeholder="Sitio Web Proveedor" maxlength="100" 

                      rel="popover" data-container="body" data-toggle="popover" data-placement="right"  title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el SITIO WEB del proveedor">

				</div>

                

				<div class="form-group">

					<label for="icp_giro" class="control-label">GIRO </label>

				      <input type="text" name="icp_giro" class="form-control" id="icp_giro" placeholder="Giro del Proveedor" maxlength="100" 

                      rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z-0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el GIRO del proveedor">

				</div>

                

                <div class="form-group">

                  <label for="icp_contacto" class="control-label">DATOS DE CONTACTO</label>

                  <textarea name="icp_contacto" class="form-control" id="icp_contacto" cols="40" rows="5" placeholder="Escribe los datos de contacto del proveedor" maxlength="300"  

                  rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{300}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega los DATOS DE CONTACTO del proveedor, Nombre encargado u otro"></textarea>  

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

