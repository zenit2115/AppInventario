	function load(page) {
	    var parametros = { "action": "ajax", "page": page };
	    $("#loader").fadeIn('slow');
	    $.ajax({
	        url: 'producto_ajax.php',
	        data: parametros,
	        beforeSend: function(objeto) {
	            $("#loader").html("<img src='loader.gif'>");
	        },
	        success: function(data) {
	            $(".outer_div").html(data).fadeIn('slow');
	            $("#loader").html("");
	        }
	    });
	}

	$('#dataUpdate').on('show.bs.modal', function(event) {
	    var button = $(event.relatedTarget)
	    var icp_id_producto = button.data('icp_id_producto')
	    var icprod_codigo = button.data('icprod_codigo')
	    var icprod_tipo_subvencion = button.data('icprod_tipo_subvencion')
	    var icprod_producto = button.data('icprod_producto')
	    var icprod_tipo_doc = button.data('icprod_tipo_doc')
	    var icprod_numero_doc = button.data('icprod_numero_doc')
	    var icprod_fecha_compra = button.data('icprod_fecha_compra')
	    var icprod_fecha_pago = button.data('icprod_fecha_pago')
	    var icprod_comentarios = button.data('icprod_comentarios')
	    var icprod_proveedor = button.data('icprod_proveedor')
	    var icprod_precio = button.data('icprod_precio')
	    var icprod_cantidad = button.data('icprod_cantidad')
	    var icprod_tipo_pago = button.data('icprod_tipo_pago')
	    var icprod_tipo_categoria = button.data('icprod_tipo_categoria')
	    var icprod_tipo_subcategoria = button.data('icprod_tipo_subcategoria')
	    var icprod_accion = button.data('icprod_accion')
	    var icprod_estado_producto = button.data('icprod_estado_producto')
	    var icprod_fecha_recepcion = button.data('icprod_fecha_recepcion')
	    var icprod_ubicacion = button.data('icprod_ubicacion')
	    var icprod_fecha_baja = button.data('icprod_fecha_baja')
	    var icprod_nom_responsable = button.data('icprod_nom_responsable')
	    var modal = $(this);

	    modal.find('.modal-title').text('Modificar producto: ' + icprod_producto)
	    modal.find('.modal-body #icp_id_producto').val(icp_id_producto)
	    modal.find('.modal-body #icprod_codigo').val(icprod_codigo)
	    modal.find('.modal-body #icprod_tipo_subvencion').val(icprod_tipo_subvencion)
	    modal.find('.modal-body #icprod_producto').val(icprod_producto)
	    modal.find('.modal-body #icprod_tipo_doc').val(icprod_tipo_doc)
	    modal.find('.modal-body #icprod_numero_doc').val(icprod_numero_doc)
	    modal.find('.modal-body #icprod_fecha_compra').val(icprod_fecha_compra)
	    modal.find('.modal-body #icprod_fecha_pago').val(icprod_fecha_pago)
	    modal.find('.modal-body #icprod_comentarios').val(icprod_comentarios)
	    modal.find('.modal-body #icprod_proveedor').val(icprod_proveedor)
	    modal.find('.modal-body #icprod_precio').val(icprod_precio)
	    modal.find('.modal-body #icprod_cantidad').val(icprod_cantidad)
	    modal.find('.modal-body #icprod_tipo_pago').val(icprod_tipo_pago)
	    modal.find('.modal-body #icprod_tipo_categoria').val(icprod_tipo_categoria)
	    modal.find('.modal-body #icprod_tipo_subcategoria').val(icprod_tipo_subcategoria)
	    modal.find('.modal-body #icprod_accion').val(icprod_accion)
	    modal.find('.modal-body #icprod_estado_producto').val(icprod_estado_producto)
	    modal.find('.modal-body #icprod_fecha_recepcion').val(icprod_fecha_recepcion)
	    modal.find('.modal-body #icprod_ubicacion').val(icprod_ubicacion)
	    modal.find('.modal-body #icprod_fecha_baja').val(icprod_fecha_baja)
	    modal.find('.modal-body #icprod_nom_responsable').val(icprod_nom_responsable)
	    $('.alert').hide(); //Oculto alert

	});



	$('#dataDelete').on('show.bs.modal', function(event) {
	    var button = $(event.relatedTarget) // Botón que activó el modal
	    var icp_id_producto = button.data('icp_id_producto')
	    var modal = $(this)
	    modal.find('#icp_id_producto').val(icp_id_producto)
	});

	$("#actualidarDatos").submit(function(event) {
	    var parametros = $(this).serialize();
	    $.ajax({
	        type: "POST",
	        url: "modificar.php",
	        data: parametros,
	        beforeSend: function(objeto) {
	            $("#datos_ajax").html("Mensaje: Cargando...");
	        },
	        success: function(datos) {
	            $("#datos_ajax").html(datos);
	            load(1);
	        }
	    });
	    event.preventDefault();
	});

	$("#guardarDatos").submit(function(event) {
	    var parametros = $(this).serialize();
	    $.ajax({
	        type: "POST",
	        url: "agregar.php",
	        data: parametros,
	        beforeSend: function(objeto) {
	            $("#datos_ajax_register").html("Mensaje: Cargando...");
	        },
	        success: function(datos) {
	            $("#datos_ajax_register").html(datos);
	            load(1);
	        }
	    });
	    event.preventDefault();
	});

	$("#eliminarDatos").submit(function(event) {
	    var parametros = $(this).serialize();
	    $.ajax({
	        type: "POST",
	        url: "eliminar.php",
	        data: parametros,
	        beforeSend: function(objeto) {
	            $(".datos_ajax_delete").html("Mensaje: Cargando...");
	        },
	        success: function(datos) {
	            $(".datos_ajax_delete").html(datos);
	            $('#dataDelete').modal('hide');
	            load(1);
	        }
	    });
	    event.preventDefault();
	});


	function pagoOnChange(sel) {
	    if (sel == "cheque") {
	        divC = document.getElementById("nCuenta");
	        divC.style.display = "";
	    } else {
	        divC = document.getElementById("nCuenta");
	        divC.style.display = "none";
	        document.getElementById("icprod_numero_cheque").value = "";
	        document.getElementById("icprod_numero_cheque").text = "";
	    }
	}