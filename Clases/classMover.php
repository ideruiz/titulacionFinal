<?php  

	include_once('Conexion.php');

	class Mover{

		private $conexion;
		private $names=0;
		private $insertNames=0;


		function __construct($Conn){
			$this->conexion = $Conn;
		}

		
		function verificaValidaciones(){

			$validados = 0;
			$registros = 0;

			$sql = "SELECT fk_alumno, idiomas,documento_firmas, servicio_social,pago_titulacion FROM validaciones";

			$sentencia = $this->conexion->consulta($sql);
			$registros = 0;
			//ECHO $registros;

			while($row = mysqli_fetch_array($sentencia)){

				if($row['idiomas']=='1' AND $row['documento_firmas']=='1' AND $row['servicio_social']=='1' AND $row['pago_titulacion']=='1'){
					$sql = "UPDATE validaciones SET estado_validacion='1' WHERE fk_alumno=$row[fk_alumno]";
					$result = $this->conexion->consulta($sql);
					$registros = $registros + 1;
					if(!$result)
						{ ECHO "Error: El alumno $row[fk_alumno] no se pudo procesar"; 
							//return false;
						}
						
					else{
						$validados = $validados + 1;
					}

				}
				else{
					$sql = "UPDATE validaciones SET estado_validacion='0' WHERE fk_alumno=$row[fk_alumno]";
					$result = $this->conexion->consulta($sql);
					if(!$result)
						ECHO "Error: El alumno $row[fk_alumno] no se pudo procesar";
				}
			}

			if ($validados == $registros){
				return true;
			}
			else
				return false;
		}

		function prepararTablas(){

			//Vaciar tabla "titulacion"
			$elimina = "TRUNCATE TABLE titulacion";
			$limpiaTitulacion = $this->conexion->consulta($elimina);

			//vaciar tabla "profesionista" 
			$elimina = "TRUNCATE TABLE profesionista";
			$limpiaProfesionista = $this->conexion->consulta($elimina);

			if($limpiaTitulacion && $limpiaTitulacion){ return true;}
			else { return false;}
		}

		function copiarValidados(){
			//Copiar alumnos validados a la tabla titulacion			
			$sql = "INSERT INTO titulacion (fk_alumno) 
				SELECT (fk_alumno)
				FROM validaciones
				WHERE estado_validacion = '1' ";
			$result = $this->conexion->consulta($sql);

			//Copiar alumnos validados a la tabla profesionista
			$sql2 = "INSERT INTO profesionista (fk_alumno) 
				SELECT (fk_alumno)
				FROM validaciones
				WHERE estado_validacion = '1' ";
			$result2 = $this->conexion->consulta($sql2);

			if($result && $result2) { return true;}
			else { return false; }

		}


		function copiarDatos(){	

				//Copiar datos de la tabla constantes a la tabla profesionista
				$Q="SELECT fk_alumno FROM titulacion";
				$result = $this->conexion->consulta($Q);

				while($row = mysqli_fetch_array($result)){

					$fk = $row['fk_alumno'];
					//ECHO $alumno;

					$query = "SELECT nombre_alumno 
							  FROM alumno 
							  WHERE id_alumno = $fk";

					$nombre = $this->conexion->consulta($query);

					
					while($alumno=mysqli_fetch_array($nombre)){
						$this->names=$this->names+1;

						$consulta = "UPDATE titulacion 
						SET nombre='$alumno[nombre_alumno]',
							nombre_rector = (SELECT nombre_rector FROM constantes),
							administracion_escolar = (SELECT admin_escolar FROM constantes),
							institucion = (SELECT institucion FROM constantes),
							entidad_institucion = (SELECT entidad_institucion FROM constantes),
							examen_profesional = (SELECT ex_profesional FROM constantes),
							exp_titulo = (SELECT exp_titulo FROM constantes),
							certificacion = (SELECT exp_certificado FROM constantes)
							WHERE fk_alumno='$fk'";

						$res = $this->conexion->consulta($consulta);
						
						if($res){
							$this->insertNames=$this->insertNames+1;
						}
					}
				}

				if($this->names==$this->insertNames){
					return true;
				}
				else{
					return false;
				}
		}//END Function

		function eliminarValidados(){
			$count = 0;
			$borrados = 0;

			$sql = "SELECT fk_alumno FROM validaciones WHERE estado_validacion = '1' ";
			$result = $this->conexion->consulta($sql);

			while($row = mysqli_fetch_array($result)){
				$count = $count + 1;
				$sql = "DELETE FROM alumno WHERE id_alumno = $row[fk_alumno]";
				$res = $this->conexion->consulta($sql);
				if(!$res){
					ECHO "Alumno: ".$row['fk_alumno']." No se pudo procesar <br>";	
				}
				else{
					$borrados = $borrados + 1;
				}
			}

			if($borrados == $count){
				return true;
			}
			else{
				return false;
			}

		}//fin de la funcion.

		
	}//End Clase
?>