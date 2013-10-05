$(document).ready(function(){

		//EFECTOS DE LOS BOTONES "PRINCIPALES"

		//BOTON USUARIOS
		$('#titulacion').on('click', function(){
		$('#content').css("display", "none");
		$('#content').fadeIn('slow');
		$('#content').load('verTitulacion.php');
		});

		//BOTON CATALOGOS
		$('#cedula').on('click', function(){
		$('#content').css("display", "none");
		$('#content').fadeIn('slow');
		$('#content').load('verCertificacion.php');
		});
});