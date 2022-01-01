<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div> 
        
        
        <div class="form-group">
			<label for="icusuario_nombre" class="control-label">NOMBRE</label>
				<input type="text" name="icusuario_nombre" class="form-control" id="icusuario_nombre" placeholder="Ingrese su Nombre" maxlength="100" 
                rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debe agregar su NOMBRE, solo letras">
		</div>
		
        <div class="form-group">
			<label for="icusuario_apellido" class="control-label">APELLIDO</label>
				<input type="text" name="icusuario_apellido" class="form-control" id="icusuario_apellido" placeholder="Ingrese su apellido" maxlength="100" 
                rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debe agregar su APELLIDO, solo letras">
		</div>
        
		<div class="form-group">
			<label for="icusuario_email" class="control-label">E-MAIL</label>
				<input type="email" pattern="^[-\w.]+@{1}[-a-z0-9]+[.]{1}[a-z]{2,5}$" name="icusuario_email" class="form-control" id="icusuario_email" placeholder="Ingrese su e-mail" 
                        rel="popover" data-container="body" data-toggle="popover" data-placement="right" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega un CORREO ELECTRÓNICO del tipo ejemplo@mimail.com">
		</div>
        
		<div class="form-group">
			<label for="icusuario_telefono" class="control-label">TELÉFONO </label>
            	<input type="tel" name="icusuario_telefono" class="form-control" id="icusuario_telefono" placeholder="ingrese su teléfono" maxlength="11"  
                      rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[569]{3}[0-9]{8}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaucion" data-content="Agrega SOLO NÚMEROS, del tipo 569 12345678">				    
		</div>
        
		<div class="form-group">
			<label for="icusuario_clave" class="control-label">CONTRASEÑA</label>
				<input type="password" name="icusuario_clave" class="form-control" id="icusuario_clave" placeholder="Ingrese su constraseña" maxlength="20" 
                rel="popover" data-container="body" data-toggle="popover" data-placement="right" pattern="^[A-Za-z0-9 ]{6,20}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Ingrese solo números y texto, mínimo de 6 dígitos y máximo de 20 cifras">
		</div>
           
        <div class="form-group">
			<label for="icusuario_tipousuario" class="control-label">TIPO DE USUARIO</label>
				<select name="icusuario_tipousuario" class="form-control chosen-select" style="width:250px;" id="icusuario_tipousuario" >
                	<option value="0">SELECCIONE</option>
					<option value="asistente">asistente</option>
                    <option value="admin">admin</option>
                </select>
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