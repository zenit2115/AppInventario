<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Tipo Subvencion</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
            
                
			  <div class="form-group">
				<label for="ictiposubvencion" class="control-label">SUBVENCION</label>
				      <input type="text" name="ictiposubvencion" class="form-control" id="ictiposubvencion" placeholder="Tipo Subvencion" maxlength="100"   rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z-0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el TIPO de SUBVENCION">
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
