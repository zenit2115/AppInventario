	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'usuario_ajax.php',
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
		  var icp_id_usuario = button.data('icp_id_usuario') 
	  //creo una variable en la que guardo el contenido de los registros de la base de datos (nombre[nombre del registro de bd])
		  var icusuario_nombre= button.data('nombre')
		  var icusuario_apellido = button.data('apellido')		  
		  var icusuario_telefono = button.data('telefono') 
		  //Tuve que cambiar el nombre del usuario de la base de datos a todo con minuscula para que me los detectara
		  var icusuario_email = button.data('correoelectronico') 
		  var icusuario_clave = button.data('contrasena') 
		  var icusuario_tipousuario = button.data('tipousuario') 
		  

		  var modal = $(this)
		  //Nombre de lo que salra en la cabecera del modal modificar 
		  modal.find('.modal-title').text('Modificar Usuario: '+icusuario_nombre)
		  modal.find('.modal-body #icp_id_usuario').val(icp_id_usuario)
		  modal.find('.modal-body #icusuario_nombre').val(icusuario_nombre)
		  modal.find('.modal-body #icusuario_apellido').val(icusuario_apellido)
		  modal.find('.modal-body #icusuario_telefono').val(icusuario_telefono)
		  modal.find('.modal-body #icusuario_email').val(icusuario_email)
		  modal.find('.modal-body #icusuario_clave').val(icusuario_clave)
		  modal.find('.modal-body #icusuario_tipousuario').val(icusuario_tipousuario)

		  
		  $('.alert').hide();//Oculto alert
		})
		
		$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var icp_id_usuario = button.data('icp_id_usuario') 
		  var modal = $(this)
		  modal.find('#icp_id_usuario').val(icp_id_usuario)
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