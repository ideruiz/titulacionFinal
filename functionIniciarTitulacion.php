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

	/**
	*	@var 	valida  	boolean
	*/
	$valida = $titulacion->verificaValidaciones();

	if($valida){
		$nombres = $titulacion->copiaDatos();
		var_dump($nombres);
		if($nombres){
				$validados = $titulacion->eliminaValidados();
				if($validados){
					ECHO "Proceso de Titulacion Iniciado Correctamente";	
				}
				else{
					ECHO $validados;
				}				
		}
		else{
			ECHO "Error, no se pudo iniciar el proceso de Titulacion.";
		}

	}
	else{
		ECHO "No se pudieron procesar la validaciones, intentelo de nuevo";
	}


	
?>