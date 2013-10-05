$(document).ready(function(){

	$('#tabla_vista').load('verBachilleratos.php');

	$('#div_guardar').click(function() {

		var alerta = "";
		if ( $('#bachillerato').val()==""){
			//mensaje = 
			alerta = alerta + ("-bachillerato obligatorio\n");
		}
		if ( $('#entidad').val()==""){
			//mensaje = 
			alerta = alerta + ("-entidad obligatorio\n");
		}
		
		if(alerta == ""){

			bachillerato = $('#bachillerato').val();
	        entidad 	= $('#entidad').val();

	        $.ajax({
	            type:'POST',
	            url: './functionBachillerato.php',
	            data:{
	                bachillerato : bachillerato,
	                entidad 	: entidad
	            }

	        }).done(function (mensaje){
	            $('#aviso').html(mensaje);
	            $('#tabla_vista').load('verBachilleratos.php');
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
				
		}
		
		else{
			alert(alerta);
		}


		
				
	});
});