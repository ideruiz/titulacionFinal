$(document).ready(function(){

	$('#div_cerrar').click( function (){
		$('#window').removeClass("visible");
		$('#fondo').removeClass("fondo");
		$('#todo').css("display", "none");
		$('#todo').fadeIn('slow');
		$('#todo').load('formBachillerato.html');
	});

	$('#div_guardar2').click(function() {

		id 		= $('#id_preparatoria').val();
		prepa 		= $('#preparatoria').val();
		entidadPrepa = $('#entidadPreparatoria').val();
		
		// tipo 1 = editar;
	    var tipo = 1;

	    $.ajax({
	        type:'POST',
	        url: './alertBachilleratos.php',
	        data:{
	        	tipo 	: tipo,
				id 		: id,
	        	prepa 	: prepa,	        	
	            entidadPrepa : entidadPrepa
	        }

	        }).done(function (mensaje){
	        	$('#aviso2').addClass("avisoexito");
	            $('#aviso2').html(mensaje);
	            $('#tabla_vista').load('verBachilleratos.php');
	  
	        }).fail(function (mensaje){
	        	$('#aviso2').addClass("avisofallo");
	            $('#aviso2').html("Algo salio mal");
	        });
					
	});

	
	$('#div_eliminar').click(function() {

		id 		= $('#id_preparatoria').val();
		// tipo 1 = editar;
	    var tipo = 2;

	    $.ajax({
	        type:'POST',
	        url: './alertBachilleratos.php',
	        data:{
	        	tipo 	: tipo,
	        	id 		: id,
	        }

	        }).done(function (mensaje){
	        	$('#aviso2').addClass("avisoexito");
	            $('#aviso2').html(mensaje);
	            $('#tabla_vista').load('verBachilleratos.php');
	            
	        }).fail(function (mensaje){
	        	$('#aviso2').addClass("avisofallo");
	            $('#aviso2').html("Algo salio mal");
	        });
					
	});
});
