<?php
	
	include_once('Conexion.php');

	/**
	* @param 	String 		$temporal		Nombre del directorio temporal del archivo.
	* @param 	String 		$archivo 		Archivo a ser manipulado (ya esta en el servidor).
	* @param 	String 		$directorio 	Nombre del directorio donde se almacena el archivo.
	* @param 	String 		$extension 		Extension del archivo.
	* @param 	String 		$nombre 		Nombre del archivo.
	*/
	class Archivo{

		private $temporal;
		private $archivo = 'candidatos.csv';
		private $directorio = 'Archivos/';
		private $extension;
		private $nombre;

		/**
		* @return 	String 		Extension del archivo. 	
		*/
		function getTipoArchivo($archivo){

			if($archivo!=''){
				return end(explode('.',$archivo));
			}
		}


		/**
		* @return 	boolean		True si el la extension del archivo es compatible
		*/
		function verificaTipo(){

			if($this->getTipoArchivo($this->archivo) == $this->extension){
				return true;
			}
			else{
				return false;
			}
		}

		/**
		* @return 	boolean 	True si el archivo se ha cargado exitosamente.
		*/
		function cargarArchivo(){

			if( file_exists($this->directorio.$this->archivo) ){
				//ECHO "<br>El archivo '$this->archivo' ya existe en el servidor";
				return false;
			}

			else{
				move_uploaded_file($this->temporal, $this->directorio.$this->nombre.".".$this->extension);
				return true;
			}
		}

		/**
		* @return 	boolean 	True si el archivo se ha eliminado exitosamente.
		*/
		function eliminarArchivo(){

			if (file_exists($this->directorio.$this->archivo)){

				unlink($this->directorio.$this->archivo);

				return true;
			}

			else{
				return false;
			}
		}

		/**
		* @return 	boolean 	True si el archivo se ha abierto exitosamente.
		*/
		function abrirArchivo(){
			$abierto =  fopen($this->directorio.$this->archivo,"r");
			return $abierto;
		}

		/**
		* @return 	boolean 	True si el archivo se ha cerrado exitosamente.
		*/
		function cerrarArchivo($handle){
			return fclose($handle);
		}

		function existeArchivo(){
			return file_exists($this->directorio.$this->archivo);
		}

		function insertarBD($conn){

			$open = $this->abrirArchivo();
			//$i=0;
			$count=0;
			$count2=0;

			while( ($row = fgetcsv($open,1000,",","\n")) !== false ){
				$count++;
				//almacenar los campos en variables
				$programa		=$row[0];
				$descripcion	=$row[1];
				$id_alumno		=$row[2];	
				$nombre			=$row[3];
				$clase			=$row[4];
				$c_carrera		=$row[6];
				$c_inscritos	=$row[7];
				$c_ganados		=$row[8];
				$p_avance		=$row[9];
				$c_avance		=$row[10];				
				
				/**
				*	limpiar_entrada: verifica que las variables estén codificadas en UTF-8
				*/
				$programa 		= $conn->limpiar_entrada( $programa ); 
				$descripcion 	= $conn->limpiar_entrada( $descripcion ); 
				$nombre 		= $conn->limpiar_entrada( $nombre ); 
				
				$p_avance = str_replace("%", "", $p_avance);

				$alumno = "INSERT into alumno (
					programa,
					descripcion,
					id_alumno,
					nombre_alumno,
					clase_alumno,
					creditos_carrera,
					creditos_inscritos,
					creditos_ganados,
					porcentaje_avance,
					creditos_avance) 	
					VALUES(
						'$programa',
						'$descripcion',
						$id_alumno,
						'$nombre',
						$clase,
						$c_carrera,
						$c_inscritos,
						$c_ganados,
						$p_avance,
						$c_avance)";
		
				$a = $conn->consulta( $alumno ); 
				if($a){
					$count2++;
				}


				$id="INSERT into validaciones (fk_alumno) VALUES ($id_alumno)";

				$i = $conn->consulta( $id );
			}

			if($count==$count2){
				return true;
			}
			else{
				return false;
			}

		}		

	}

?>
