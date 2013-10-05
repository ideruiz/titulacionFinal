<?php

	include_once('Clases/Registro.php');
	include_once('Clases/Sesion.php');
	

	$Conn = new Conexion();

	$user 		= $_POST["user"];
	$password 	= $_POST["pass"];


		$Registro = new Registro($Conn);
		$existe = $Registro->buscaUsuario($user,$password);	

		if($existe){

			$sesion;

			$start = $sesion->crear();

			if($start){
				$creaUsuario = $sesion->setUsuario($user);
				$flag = 1;
				ECHO "$flag";
			}
			else{
				//redireccionar
			}

			//session_start();
			/*
			if ($user) 
				{
   					 $_SESSION['sesion'] = $user; 
   					 var_dump($_SESSION);
   				}
   			if ($_SESSION['sesion'])
				{
    				$flag = 1;
				}	*/
		}
		else
			ECHO "<p>Verifique su usuario y contraseña</p>";
	
?>
