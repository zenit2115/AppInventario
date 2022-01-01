<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Tipo Documento</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>	
				<div class="form-group">
					<label for="ictipodocumento" class="control-label">TIPO DOCUMENTO</label>
                      <input type="hidden" class="form-control" id="icp_id_documentos" name="icp_id_documentos">
				      <input type="text" name="ictipodocumento" class="form-control" id="ictipodocumento" placeholder="Tipo Documento" maxlength="100"   rel="popover" data-container="body" data-toggle="popover" data-placement="right"  pattern="^[a-zA-Z-0-9 ]{1,100}$" title="  <img src='../../images/precaucion.png' alt='precaución' style='height:20px; width:20px;'> Precaución" data-content="Debes agregar el TIPO de DOCUMENTO">
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