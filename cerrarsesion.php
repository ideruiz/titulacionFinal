<?php

	/**
	 * Termina la sesion y destruye todas las 
	 * variables de sesion. 
	 */

		session_start(); 
				
		session_unset();				  // Libera todas las variables de sesión registradas
		session_destroy();                //Destruye la sesión actual

		header("Location: ./index.html"); //Redirecciona al login
	
		exit();
?>