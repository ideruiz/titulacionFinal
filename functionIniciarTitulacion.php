<?php

	include_once("Clases/classMover.php");

	/**
	*@var 	Conn 	Objeto para la conexion.
	*/
	$Conn = new Conexion();
	
	/**
	*@var 	titulacion 	Objeto para gestionar el proceso de Titulacion.
	*/
	$titulacion = new Mover($Conn);


	$verifica = $titulacion->verificaValidaciones();
	if($verifica){

		$preparadas = $titulacion->prepararTablas();
		if($preparadas){

			$copiados = $titulacion->copiarValidados();			
			if($copiados){

				$datos = $titulacion->copiarDatos();			
				if($datos){

					$eliminados = $titulacion->eliminarValidados();
					if($eliminados){
						ECHO "El Proceso de Titulación se ha iniciado Correctamente";
					}
					else{
						ECHO "Error: No se puede iniciar el proceso de Titulación, inténtelo otra vez por favor.";
					}
				
				}
			}			
		}

	}
	
?>