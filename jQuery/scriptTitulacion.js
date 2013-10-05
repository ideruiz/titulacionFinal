/*$(document).ready(function(){

	$('#editartit').click( function (){

			var alumno = $('input[name=alumno]').val();
			alert(alumno);

			$('#todo').css("display", "none");
			$('#todo').fadeIn('slow');
			$('#todo').load('formDatos.php');
	});

});
*/
function check(a){

	var alumno = a;
	//alert(alumno);

	$.ajax({
	            type:'POST',
	            url: './formDatos.php',
	            data:{ alumno: alumno }

	        }).done(function (mensaje){
	            $('#todo').html(mensaje);
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });


}