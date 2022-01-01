	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'configuracion_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}

		$('#dataUpdate').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var icp_id_configuracion = button.data('icp_id_configuracion') 
			var icconfiguracion_ruta = button.data('icconfiguracion_rut') 		 
			var icconfiguracion_nombre = button.data('icconfiguracion_nombre') 
			var icconfiguracion_direccion = button.data('icconfiguracion_direccion') 
			var icconfiguracion_telefono1 = button.data('icconfiguracion_telefono1') 			
			var icconfiguracion_cedulaa = button.data('icconfiguracion_cedula') 
			var icconfiguracion_nombredirector = button.data('icconfiguracion_nombredirector') 
			var icconfiguracion_apellidodirector = button.data('icconfiguracion_apellidodirector') 
			var icconfiguracion_email = button.data('icconfiguracion_email') 
			var icconfiguracion_telefono2 = button.data('icconfiguracion_telefono2') 
			var icconfiguracion_telefono3 = button.data('icconfiguracion_telefono3')  
					  
		  var modal = $(this)
			modal.find('.modal-title').text('Modificar configuracion: ' + icconfiguracion_nombre)
			modal.find('.modal-body #icp_id_configuracion').val(icp_id_configuracion)
			modal.find('.modal-body #icconfiguracion_ruta').val(icconfiguracion_ruta)
			modal.find('.modal-body #icconfiguracion_nombre').val(icconfiguracion_nombre)
			modal.find('.modal-body #icconfiguracion_direccion').val(icconfiguracion_direccion)
			modal.find('.modal-body #icconfiguracion_telefono1').val(icconfiguracion_telefono1)
			modal.find('.modal-body #icconfiguracion_cedulaa').val(icconfiguracion_cedulaa)
			modal.find('.modal-body #icconfiguracion_nombredirector').val(icconfiguracion_nombredirector)
			modal.find('.modal-body #icconfiguracion_apellidodirector').val(icconfiguracion_apellidodirector)			
			modal.find('.modal-body #icconfiguracion_email').val(icconfiguracion_email)
			modal.find('.modal-body #icconfiguracion_telefono2').val(icconfiguracion_telefono2)
			modal.find('.modal-body #icconfiguracion_telefono3').val(icconfiguracion_telefono3)

		  $('.alert').hide();//Oculto alert
		})
		
		$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var icp_id_configuracion = button.data('icp_id_configuracion') 
		  var modal = $(this)
		  modal.find('#icp_id_configuracion').val(icp_id_configuracion)
		})

	$( "#actualidarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "modificar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
		
		$( "#guardarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "agregar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_register").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_register").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
		
		$( "#eliminarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "eliminar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
					
					$('#dataDelete').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
		});