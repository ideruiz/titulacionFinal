$(document).ready(function () {

	$("#cargar").click(function (){
		$('#aviso').html("");
		$('#aviso').html("Procesando...");


		$.ajax({
	            type:'POST',
	            url: 'functionArchivo.php',
	            data:{       }

	        }).done(function (mensaje){
	        	//alert(mensaje);
	            $('#aviso').html(mensaje);
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });

	});

});