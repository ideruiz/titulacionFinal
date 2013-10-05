<?php

/*
 * Clase: Sesion PHP
 */
class Sesion
{
	private $usuario;
	private $creado = false;

	function crear(){
		$iniciado = session_start(); //Iniciamos la Sesion o la Continuamos
		$this->creado = $iniciado;
ECHO "creado";
		var_dump($this->creado);
		return $this->creado;
	}
	function setUsuario($u){
		$this->usuario = $u;
	}
	function getUsuario(){
		return $this->usuario;
	}
	function checaIniciado(){
		if ($this->creado == false){
			return false;
		}
		if ($this->creado == true){
			return true;
		}
	}

}

$sesion = new Sesion();

?>