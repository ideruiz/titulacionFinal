$(document).ready(function(){

	$('#btn-terminar').click(function(){
		 $.ajax({
	            type:'POST',
	            url: './functionHistorial.php',
	            data:{ }

	        }).done(function (mensaje){
	            $('#aviso').html(mensaje);
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });

	});

});