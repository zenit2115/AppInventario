<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Configuración</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
            
				<div class="form-group">
					<label for="icconfiguracion_rut" class="control-label">RUT INSTITUCIÓN</label>
				    <input type="text" name="icconfiguracion_rut" class="form-control" id="icconfiguracion_rut" placeholder="RUT Proveedor" maxlength="12"  rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[0-9]{1,2}[\.]{1}[0-9]{3}[\.]{1}[0-9]{3}[-]{1}[0-9a-zA-Z]{1}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Debes agregar un RUT en este estilo, 51.123.456-1">
				</div>
                
			  <div class="form-group">
				<label for="icconfiguracion_nombre" class="control-label">NOMBRE INSTITUCIÓN</label>
				      <input type="text" name="icconfiguracion_nombre" class="form-control" id="icconfiguracion_nombre" placeholder="Nombre Institución" maxlength="100"   rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z-0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el NOMBRE de la institución">
			  </div>
              
			<div class="form-group">
				<label for="icconfiguracion_direccion" class="control-label">DIRECCIÓN </label>
					<textarea name="icconfiguracion_direccion" class="form-control" id="icconfiguracion_direccion" cols="40" rows="5" placeholder="Escribe la dirección de la Institución" maxlength="500"
                     rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z0-9 ]{1,500}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega la DIRECCIÓN de la Institución"></textarea>	
			</div>
			
            	<div class="form-group">
					<label for="icconfiguracion_telefono1" class="control-label">TELÉFONO INSTITUCIÓN</label>
				      <input type="tel" name="icconfiguracion_telefono1" class="form-control" id="icconfiguracion_telefono1" placeholder="Teléfono de la Institución" maxlength="11"  
                      rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[569]{3}[0-9]{8}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega SOLO NÚMEROS, del tipo 569 12345678">				    
				</div>
                
				<div class="form-group">
				<label for="icconfiguracion_cedula" class="control-label">RUT DIRECTOR</label>
					<input type="text" name="icconfiguracion_cedula" class="form-control" id="icconfiguracion_cedula" placeholder="RUT Director" maxlength="12" 
                    rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[0-9]{1,2}[\.]{1}[0-9]{3}[\.]{1}[0-9]{3}[-]{1}[0-9a-zA-Z]{1}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Debes agregar un RUT en este estilo, 8.123.456-1">
			</div>
            
            <div class="form-group">
				<label for="icconfiguracion_nombredirector" class="control-label">NOMBRE DIRECTOR</label>
					<input type="text" pattern="^[a-zA-Z ]{1,40}$" name="icconfiguracion_nombredirector" class="form-control" id="icconfiguracion_nombredirector"  placeholder="Nombre Director" maxlength="40" 
                    rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el NOMBRE del Director">
			</div> 
            
			<div class="form-group">
				<label for="icconfiguracion_apellidodirector" class="control-label">APELLIDO DIRECTOR</label>
					<input type="text" pattern="^[a-zA-Z ]{1,40}$" name="icconfiguracion_apellidodirector" class="form-control" id="icconfiguracion_apellidodirector"  placeholder="Apellido Director" maxlength="40" 
                     rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el APELLIDO del Director">
			</div>
            
			<div class="form-group">
				<label for="icconfiguracion_email" class="control-label">E-MAIL</label>
					<input type="email" pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$" name="icconfiguracion_email" class="form-control" id="icconfiguracion_email"  placeholder="E-mail Director" 
                    rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega un CORREO ELECTRÓNICO del tipo ejemplo@mimail.com">
			</div>
            
			<div class="form-group">
				<label for="icconfiguracion_telefono2" class="control-label">TELÉFONO DIRECTOR</label>
					<input type="text" name="icconfiguracion_telefono2" class="form-control" id="icconfiguracion_telefono2"  placeholder="Teléfono Director" maxlength="11" 
                    rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[569]{3}[0-9]{8}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega SOLO NÚMEROS, del tipo 56912345678">
			</div>
            
			<div class="form-group">
					<label for="icconfiguracion_telefono3" class="control-label">TELÉFONO FIJO </label>
				      <input type="tel" name="icconfiguracion_telefono3" class="form-control" id="icconfiguracion_telefono3" placeholder="Teléfono Fijo Director" maxlength="9" 
                      rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[4]{1}[0-9]{1}[2]{1}[0-9]{6}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega SOLO NÚMEROS, del tipo 452123456">
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