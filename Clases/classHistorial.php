<?php 

	include_once('Conexion.php');

	class Historial{

		private $conexion;

		function __construct($Conn){
				$this->conexion = $Conn;
			}

		function limpiarTablas(){
			$sql = "TRUNCATE TABLE titulacion";
			$sql2 = "TRUNCATE TABLE profesionista";

			$titulacion = $this->conexion->consulta($sql);
			$profesionista = $this->conexion->consulta($sql2);

			if($titulacion && $profesionista) 
				{return true;}
			else 
				{return false;}
		}

		function agregarHistorial(){

			$sql = "INSERT INTO historial SELECT `fk_alumno`,
						 `tipo_titulacion`,
						 `nombre`,
						 `a_paterno`,
						 `a_materno`,
						 `titulo`,
						 `nombre_rector`,
						 `exp_titulo`,
						 `libro`,
						 `foja`,
						 `curp`,
						 `nombre_bachillerato`,
						 `periodo_bachillerato`,
						 `entidad_bachillerato`,
						 `institucion`,
						 `carrera`,
						 `periodo_carrera`,
						 `entidad_institucion`,
						 `examen_profesional`,
						 `certificacion`,
						 `administracion_escolar` FROM `titulacion`";

			$inserta = $this->conexion->consulta($sql);

			return $inserta;
		}
	}
 ?>

						 	
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							