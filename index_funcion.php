<?php

	include_once('Clases/Registro.php');
	include_once('Clases/Sesion.php');	

	$Conn = new Conexion();

	$flag 		= "false";
	$user 		= $_POST["user"];
	$password 	= $_POST["pass"];


		$Registro = new Registro($Conn);
		$existe = $Registro->buscaUsuario($user,$password);

		if($existe){
			$rol = $Registro->buscaRol($user,$password);
			
			ECHO $rol;
		}
		if(!$existe){			
			$flag = "false";
			ECHO $flag;
			
		}
?>
