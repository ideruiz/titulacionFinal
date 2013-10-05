$(document).ready(function (){

	$('#tabla_vista').load('verEstados.php');

	$('#div_cerrar').click( function (){
		$('#window').removeClass("visible");
		$('#fondo').removeClass("fondo");
		$('#div_opc').css("display", "none");
		$('#div_opc').fadeIn('slow');
		$('#div_opc').load('formEstados.html');
	});

	$('#div_guardar').click( function(){

		var tipo='0';
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
				            	  id: id
				            	}
				        }).done(function (mensaje){
				        	$('#aviso2').addClass("avisoexito");
							$('#aviso').html(mensaje);
							$('#tabla_vista').load('verEstados.php');

				        }).fail(function (mensaje){
				        	$('#aviso2').addClass("avisofallo");
				            $('#aviso').html("Algo salio mal");
				        });
		}

	});

	$('#div_editar').click( function(){

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
		var estado = $('input[name=estado_ed]').val();
		var clave = $('input[name=clave_ed]').val();
		var numero = $('input[name=numero_ed]').val();
		var tipo = $('input[name=tipo_ed]').val();
		var id = $('input[name=id_estado_ed]').val();

		
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
				            	  id: id
				            	}
				        }).done(function (mensaje){
				        	$('#aviso2').addClass("avisoexito");
							$('#aviso2').html(mensaje);
							$('#tabla_vista').load('verEstados.php');

				        }).fail(function (mensaje){
				        	$('#aviso2').addClass("avisofallo");
				            $('#aviso2').html("Algo salio mal");
				        });
		}

	});

	$('#div_eliminar').click(function (){
		var tipo = $('input[name=tipo_el]').val();
		var id = $('input[name=id_estado]').val();

		$.ajax({
				            type:'POST',
				            url: './functionEstado.php',
				            data:{
				            	  tipo: tipo,
				            	  id: id
				            	}
				        }).done(function (mensaje){
				        	$('#aviso2').addClass("avisoexito");
							$('#aviso2').html(mensaje);
							$('#tabla_vista').load('verEstados.php');

				        }).fail(function (mensaje){
				        	$('#aviso2').addClass("avisofallo");
				            $('#aviso2').html("Algo salio mal");
				        });

	});

});