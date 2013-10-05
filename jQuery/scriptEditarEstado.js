$(document).ready(function (){

	$('#nueva').click( function (){
		$('#window').addClass("visible");
		$('#fondo').addClass("fondo");
		$('#window').load('formEstados.html');
	});
});	

	function checkEdit(id){

		var id_estado = id;
		
		 $.ajax({
	            type:'POST',
	            url: './formEditarEstado.php',
	            data:{	id_estado: id_estado
	            		}

	        }).done(function (mensaje){
	        	$('#window').addClass("visible");
				$('#fondo').addClass("fondo");
				$('#window').html(mensaje);

	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
	}

	function checkDelete(id){

		var id_estado = id;
		//alert("Carrera: " + id + "Tipo: " +  tipo);		
		 $.ajax({
	            type:'POST',
	            url: './formEliminarEstado.php',
	            data:{	id_estado: id_estado
	            	}

	        }).done(function (mensaje){
	        	$('#window').addClass("visible");
				$('#fondo').addClass("fondo");
				$('#window').html(mensaje);

	        }).fail(function (mensaje){
	            $('#aviso2').html("Algo salio mal");
	        });

	}

