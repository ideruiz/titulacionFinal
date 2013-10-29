<?php 

	include_once("Clases/classHistorial.php");

	$conexion = new Conexion();

	$historial = new Historial($conexion);

	$agregar = $historial->agregarHistorial();

	if($agregar){
		$escoba = $historial->limpiarTablas();
		if($escoba){
			ECHO "El periodo de Titulacion actual ha sido finalizado correctamente";
		}
	}


 ?>