$(document).ready(function(){

		//EFECTOS DE LOS BOTONES "PRINCIPALES"

		//BOTON USUARIOS
		$('#add_user').on('click', function(){
		$('#div_opc').css("display", "none");
		$('#div_opc').fadeIn('slow');
		$('#div_opc').load('registro.php');
		});

		//BOTON CATALOGOS
		$('#catalogos').on('click', function(){
		$('#div_opc').css("display", "none");
		$('#div_opc').fadeIn('slow');
		$('#div_opc').load('catalogos.html');
		});

		//BOTON DATOS GENERALES
		$('#constantes').on('click', function(){
		$('#div_opc').css("display", "none");
		$('#div_opc').fadeIn('slow');
		$('#div_opc').load('formConstantes.php');
		});

		//BOTON IMPORTAR .CSV
		$('#cargar').on('click', function(){
		$('#div_opc').css("display", "none");
		$('#div_opc').fadeIn('slow');
		$('#div_opc').load('cargarArchivo.php');
		});


				//PÁGINA DE CATÁLOGOS

		//BOTON DE REGRESAR 1 HIJO (catálogos)
		$('#div_regresar').on('click', function(){
		$('#content').css("display", "none");
		$('#content').fadeIn('slow');
		$('#content').load('configuracion.html');
		});

		// BOTON CARRERAS

		$('#carreras').on('click', function(){
		$('#todo').css("display", "none");
		$('#todo').fadeIn('slow');
		$('#todo').load('formCarrera.html');
		});

		// BOTON BACHILLERATOS

		$('#bachilleratos').on('click', function(){
		$('#todo').css("display", "none");
		$('#todo').fadeIn('slow');
		$('#todo').load('formBachillerato.html');
		});

		// BOTON ESTADOS

		$('#estados').on('click', function(){
		$('#todo').css("display", "none");
		$('#todo').fadeIn('slow');
		$('#todo').load('formEstados.html');
		});


		//BOTON DE REGRESAR 2o HIJO (carerras)

		$('#div_regresar2').on('click', function(){
		$('#todo').css("display", "none");
		$('#todo').fadeIn('slow');
		$('#todo').load('catalogos.html');
		});

		//BOTON DE REGRESAR 3er HIJO (Exportables)

		$('#div_regresar3').on('click', function(){
		$('#todo').css("display", "none");
		$('#todo').fadeIn('slow');
		$('#todo').load('exportables.html');
		});
		

});