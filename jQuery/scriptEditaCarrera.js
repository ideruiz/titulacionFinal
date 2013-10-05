$(document).ready(function(){

	$('#div_cerrar').click( function (){
		$('#window').removeClass("visible");
		$('#fondo').removeClass("fondo");
		$('#todo').css("display", "none");
		$('#todo').fadeIn('slow');
		$('#todo').load('formCarrera.html');
	});

	$('#div_guardar2').click(function() {

		var id 		= $('#id_carrera').val();
		var carrera = $('input[name=lic]').val();
		var area 	= $('input[name=Area]').val();
		var subArea = $('input[name=Sub]').val();
		var nivel = $('input[name=Nivel]').val();
		var consecutivo = $('input[name=Consecutivo]').val();
		// tipo 1 = editar;
	    var tipo = 1;

	    $.ajax({
	        type:'POST',
	        url: './alertCarreras.php',
	        data:{
	        	tipo 	: tipo,
	        	id 		: id,
	            carrera : carrera ,
	            area 	: area,
	        	subArea : subArea,
	        	nivel 	: nivel,
	        	consecutivo: consecutivo
	        }

	        }).done(function (mensaje){
	        	$('#aviso2').addClass("avisoexito");
	            $('#aviso2').html(mensaje);
	            $('#tabla_vista').load('verCarreras.php');
	        }).fail(function (mensaje){
	        	$('#aviso2').addClass("avisofallo");
	            $('#aviso2').html("Algo salio mal");
	        });
					
	});

	
	$('#div_eliminar').click(function() {

		id 		= $('#id_carrera').val();
		// tipo 1 = editar;
	    var tipo = 2;

	    $.ajax({
	        type:'POST',
	        url: './alertCarreras.php',
	        data:{
	        	tipo 	: tipo,
	        	id 		: id,
	        }

	        }).done(function (mensaje){
	        	$('#aviso2').addClass("avisoexito");
	            $('#aviso2').html(mensaje);
	            $('#tabla_vista').load('verCarreras.php');
	        }).fail(function (mensaje){
	        	$('#aviso2').addClass("avisofallo");
	            $('#aviso2').html("Algo salio mal");
	        });
					
	});
});