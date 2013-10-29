<?php 

	include_once('Conexion.php');

	class Datos{

		private $conexion;

		function __construct($Conn){

			$this->conexion = $Conn;
		}

		function actualizarAlumno($datos){

			$titulo = "Licenciado en ".$datos['carrera'];
			$carrera = "Licenciatura en ".$datos['carrera'];
			$prepa = explode("-",$datos['prepa']);

			$e_Nac = $this->numeroEstado($datos['e_nacimiento']);

				$sql = "UPDATE titulacion
						 SET nombre='$datos[alumno]',
							a_paterno			= '$datos[paterno]',
							a_materno			= '$datos[materno]',
							titulo				= '$titulo',
							curp				= '$datos[curp]',
							tipo_titulacion		= '$datos[tipo]', 
							libro				= '$datos[libro]',
							foja				= '$datos[foja]',
							nombre_bachillerato	= '$prepa[0]',
							entidad_bachillerato= '$prepa[1]',
							periodo_bachillerato= '$datos[periodoPrepa]',
							carrera				= '$carrera',
							periodo_carrera		= '$datos[periodoCarrera]',
							exp_titulo			= '$datos[titulacion]',
							certificacion		= '$datos[certificacion]'
							WHERE fk_alumno		= '$datos[fk]'";				

				$sql2 = "UPDATE profesionista
						SET sexo 				= '$datos[sexo]',
							fecha_nacimiento	= '$datos[fecha_nac]',
							entidad_nacimiento	= '$e_Nac',
						 	pais_radica			= '$datos[p_radica]'
						 	WHERE fk_alumno		= '$datos[fk]'";

			$result2 = $this->conexion->consulta($sql2);

			$result = $this->conexion->consulta($sql);

			if($result)	return true;
			
			else return false;
			
		}


		function numeroEstado($e){
			$sql = "SELECT numero FROM estado WHERE estado = '$e'";
			$result = $this->conexion->consulta($sql);

			if ($result){

				$estado = mysqli_fetch_array($result);
				return $estado['numero'];

			}else{	return false;	}

		}


	}//fin de la clase

 ?>