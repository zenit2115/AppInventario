	function load(page) {

	    var parametros = { "action": "ajax", "page": page };
	    $("#loader").fadeIn('slow');

	    $.ajax({
	        url: 'proveedor_ajax.php',
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
	    var icp_id_proveedor = button.data('icp_id_proveedor')
	    var icp_ruta = button.data('icp_rut')
	    var icp_nombre = button.data('icp_nombre')
	    var icp_nombrecontacto = button.data('icp_nombrecontacto')
	    var icp_celular = button.data('icp_celular')
	    var icp_telefono = button.data('icp_telefono')
	    var icp_direccion = button.data('icp_direccion')
	    var icp_ciudad = button.data('icp_ciudad')
	    var icp_correo = button.data('icp_correo')
	    var icp_sitioweb = button.data('icp_sitioweb')
	    var icp_giro = button.data('icp_giro')
	    var icp_contacto = button.data('icp_contacto')
	    var modal = $(this)

	    modal.find('.modal-title').text('Modificar proveedor: ' + icp_nombre)
	    modal.find('.modal-body #icp_id_proveedor').val(icp_id_proveedor)
	    modal.find('.modal-body #icp_ruta').val(icp_ruta)
	    modal.find('.modal-body #icp_nombre').val(icp_nombre)
	    modal.find('.modal-body #icp_nombrecontacto').val(icp_nombrecontacto)
	    modal.find('.modal-body #icp_celular').val(icp_celular)
	    modal.find('.modal-body #icp_telefono').val(icp_telefono)
	    modal.find('.modal-body #icp_direccion').val(icp_direccion)
	    modal.find('.modal-body #icp_ciudad').val(icp_ciudad)
	    modal.find('.modal-body #icp_correo').val(icp_correo)
	    modal.find('.modal-body #icp_sitioweb').val(icp_sitioweb)
	    modal.find('.modal-body #icp_giro').val(icp_giro)
	    modal.find('.modal-body #icp_contacto').val(icp_contacto)
	    $('.alert').hide(); //Oculto alert
	});

	$('#dataDelete').on('show.bs.modal', function(event) {
	    var button = $(event.relatedTarget) // Botón que activó el modal
	    var icp_id_proveedor = button.data('icp_id_proveedor')
	    var modal = $(this);
	    modal.find('#icp_id_proveedor').val(icp_id_proveedor)
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