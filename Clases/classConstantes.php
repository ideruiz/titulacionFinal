<?php 
	
	include_once('Conexion.php');

	class Constantes{

		private $conexion;
		private $msjError = "Al parecer, los datos ya existen";


		function __construct($Conn){
			$this->conexion = $Conn;
		}


		function nuevasConstantes($universidad,$entidad,$id_entidad,$c_institucion,$LicMaster,$rector,$admin_escolar,$e_profesional,$f_certificacion,$f_titulacion){
			
			$sql = "INSERT INTO constantes (institucion, entidad_institucion,nombre_rector,admin_escolar,ex_profesional,exp_certificado,exp_titulo,i_estado_institucion,consecutivo_institucion,codigo_LicMaster) 
					  VALUES ('$universidad','$entidad','$rector','$admin_escolar','$e_profesional','$f_certificacion','$f_titulacion','$id_entidad','$c_institucion','$LicMaster')";

			$sentencia = $this->conexion->consulta($sql);

			if($sentencia)
				{return true;}
					
			else
				{return false;}
				
		}

		function eliminarConstantes($campo){

			$sql = "DELETE FROM carrera WHERE nombre_carrera = '$campo' ";
			$borrar = $this->conexion->consulta($sql);

			if ($borrar)
				return true;	
				
			else
				return false;
		}

		function actualizarConstantes($universidad,$entidad,$id_entidad,$c_institucion,$LicMaster,$rector,$admin_escolar,$e_profesional,$f_certificacion,$f_titulacion){
			$sql = "UPDATE constantes SET institucion	= '$universidad', 
							entidad_institucion		= '$entidad',
							nombre_rector			= '$rector',
							admin_escolar			= '$admin_escolar',
							ex_profesional			= '$e_profesional',
							exp_certificado			= '$f_certificacion',
							exp_titulo				= '$f_titulacion',
							i_estado_institucion	= '$id_entidad',
							consecutivo_institucion = '$c_institucion',
							codigo_LicMaster		= '$LicMaster' 
							WHERE id_constantes		=  '1' ";


			$actuliza = $this->conexion->consulta($sql);

			if($actuliza)
				return true;
			else 
				return false;
		
		}

	}
?>