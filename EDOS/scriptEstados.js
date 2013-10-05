$(document).ready(function (){

	$('#enviar').click( function(){

		var vacio=0;
		var msjReset = "";
		var msjObligatorio = "*Campo Requerido";

		/* Los campos de alerta se vacían.
		*/
		$('#edo').html(msjReset);
		$('#cl').html(msjReset);
		$('#num').html(msjReset);

		/* Obtener datos del formulario.
		*/
		var estado = $('input[name=estado]').val();
		var clave = $('input[name=clave]').val();
		var numero = $('input[name=numero]').val();
		var tipo = $('input[name=tipo]').val();
		var id = $('input[name=id_estado]').val();
		
		/* Validar que los campos no se encuentren vacios.
		*/
		if(estado == '' || estado == ' '){
			$('#edo').html(msjObligatorio);
			vacio = vacio + 1;
		}

		if(clave == '' || clave == ' '){
			$('#cl').html(msjObligatorio);
			vacio = vacio + 1;
		}

		if(numero == '' || numero == ' '){
			$('#num').html(msjObligatorio);
			vacio = vacio + 1;
		}

		/* Si los campos estan completos, se envía la petición.
		*/
		if(vacio == 0){

			$.ajax({
				            type:'POST',
				            url: './functionEstado.php',
				            data:{	
				            	estado: estado,
				            	  clave: clave,
				            	  numero: numero,
				            	  tipo: tipo,
				            	  id: id,
				            	}
				        }).done(function (mensaje){
							$('#aviso').html(mensaje);

				        }).fail(function (mensaje){
				            $('#aviso').html("Algo salio mal");
				        });
		}

	});

	$('eliminar').click(function (){
		var tipo = $('input[name=tipo]').val();
		var id = $('input[name=id_estado]').val();
		$.ajax({
				            type:'POST',
				            url: './functionEstado.php',
				            data:{
				            	  tipo: tipo,
				            	  id: id,
				            	}
				        }).done(function (mensaje){
							$('#aviso').html(mensaje);

				        }).fail(function (mensaje){
				            $('#aviso').html("Algo salio mal");
				        });

	});

});