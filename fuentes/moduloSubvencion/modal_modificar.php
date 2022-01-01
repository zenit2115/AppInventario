<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Tipo Subvencion</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>	
				<div class="form-group">
					<label for="ictiposubvencion" class="control-label">TIPO SUBVENCION</label>
                      <input type="hidden" class="form-control" id="icp_id_tiposubvencion" name="icp_id_tiposubvencion">
				      <input type="text" name="ictiposubvencion" class="form-control" id="ictiposubvencion" placeholder="Tipo Subvencion" maxlength="100"   rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z-0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el TIPO de SUBVENCION">
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