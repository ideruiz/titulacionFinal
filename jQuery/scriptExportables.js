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

		//BOTON HITORIAL
		$('#historial').on('click', function(){
		$('#content').css("display", "none");
		$('#content').fadeIn('slow');
		$('#content').load('verHistorial.php');
		});


		//---------------------------------------------
		$("#btn-descargarCed").click( function(){

		$.ajax({
	        type:'POST',
	        url: './archivoCertificacion.php',
	        data:{	        }

	        }).done(function (mensaje) {
	        	
				if(mensaje==true){
					$('#aviso').html("Descargando archivo de Certificacion");
					location.href='Exportables/exportableCertificacion.csv';
				}
				if(mensaje==false){
					$('#aviso').html("Hubo un error al crear el archivo, intente otra vez.");	
				}
				
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
		});

		$("#btn-descargarTit").click( function(){

			$.ajax({
		        type:'POST',
		        url: './archivoTitulacion.php',
		        data:{	        }

		        }).done(function (mensaje){
		        	if(mensaje=="true"){
		        		$('#aviso').html("Descargando archivo de Titulacion");
		        		location.href='Exportables/exportableTitulacion.xlsx';
		        	}

		        }).fail(function (mensaje){
		            $('#aviso').html("Algo salio mal");
		        });
		});

		$("#btn-descargarHist").click( function(){
				$.ajax({
		        type:'POST',
		        url: './archivoHistorial.php',
		        data:{	        }

		        }).done(function (mensaje){
		        	if(mensaje=="true"){
		        		$('#aviso').html("Descargando Historial de alumnos");
		        		location.href='Exportables/exportableHistorial.xlsx';
		        	}

		        }).fail(function (mensaje){
		            $('#aviso').html("Algo salio mal");
		        });
		});

});