<?php 

include_once('Clases/Archivo.php');

		$Conn = new Conexion();

		/**
		* @param 	String 		$temporal		Directorio temporal del archivo.
		* @param 	String 		$archivo 		Archivo a ser manipulado.
		* @param 	String 		$directorio 	Nombre del directorio donde se almacena el archivo.
		* @param 	String 		$extension 		Extension del archivo.
		*/
		
		/**
		* @param 	Objeto 		$file 		Nueva instancia de la clase Archivo.
		*/
		
		$file = new Archivo();

		if($file){

			$existe = $file->existeArchivo();

			if($existe){

					$open = $file->abrirArchivo();
					
					if($open){
						$insertar = $file->insertarBD($Conn);	

						if($insertar){
							ECHO "Los datos han sido cargados correctamente, ahora pueder visualizar los candidatos";	
						}
						else{
							ECHO "Algunos alumnos no se pudieron copiar, tal vez ya existen en la base de datos.<br>Verifique e intente otra vez";
						}						
					}
					else{
						ECHO "No se pueden cargar los datos";
					}
			}else{
				ECHO "No hay archivos para cargar";
			}
		}
		else{
			ECHO "Ha ocurrido una excepcion";

		}

 ?>