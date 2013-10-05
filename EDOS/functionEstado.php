<?php 

	include_once('Clases/classEstado.php');

	/**
	* @var 	int 	Sirve para determinar si se crea, actualiza o elimina un usuario.
	*/	
	$tipo = $_POST['tipo'];

	$Conn = new Conexion();

	$Estado = new Estado($Conn);

	if($tipo == '1'){
		$estado = $_POST['estado'];
		$clave =  $_POST['clave'];
		$numero = $_POST['numero'];

		$result = $Estado->nuevoEstado($estado, $clave, $numero);
		ECHO $result;
	}

	if($tipo == '2'){
		$estado = $_POST['estado'];
		$clave =  $_POST['clave'];
		$numero = $_POST['numero'];
		$id = $_POST['id'];

		$result = $Estado->actualizaEstado($estado, $clave, $numero,$id);
		ECHO $result;
	}
	if($tipo == '3'){
		$id = $_POST['id'];

		$result = $Estado->eliminaEstado($id);
		ECHO $result;
	}

	


 ?>