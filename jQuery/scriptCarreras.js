$(document).ready(function(){

	$('#tabla_vista').load('verCarreras.php');

	$('#div_guardar').click(function() {

		var alerta = "";
		if ( $('#carrera').val()==""){
			//mensaje = 
			alerta = alerta + ("-carrera obligatorio\n");
		}
		if ( $('#area').val()==""){
			//mensaje = 
			alerta = alerta + ("-area obligatorio\n");
		}
		if ( $('#subArea').val()==""){
			alerta = alerta + ("-subArea obligatorio\n");
		}
		if ( $('#nivel').val()==""){
			alerta = alerta + ("-nivel obligatorio\n");
		}
		if ( $('#consecutivo').val()==""){
			alerta = alerta + ("-consecutivo obligatorio\n");
		}

		if(alerta == ""){

			carrera = $('#carrera').val();
	        area 	= $('#area').val();
	        subArea = $('#subArea').val();
	        nivel 	= $('#nivel').val();
	        consecutivo= $('#consecutivo').val();
			

	        $.ajax({
	            type:'POST',
	            url: './functionCarreras.php',
	            data:{
	                carrera : carrera ,
	                area 	: area,
	        		subArea : subArea,
	        		nivel 	: nivel,
	        		consecutivo: consecutivo
	            }

	        }).done(function (mensaje){
	            $('#aviso').html(mensaje);
	            $('#tabla_vista').load('verCarreras.php');
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
				
		}
		else{
			alert(alerta);
		}		
	});
});