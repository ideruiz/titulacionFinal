<?php 

	include_once('Conexion.php');

	class Estado{

		private $conexion;
		private $msjSuccess = "Estado agregado correctamente";
		private $msjWarning = "Algo salio mal, intente otra vez";
		private $msjError = "Al parecer,el Estado ya existe";
		private $msjEstadoActualizaError = "El estado no se ha podido actualizar";
		private $msjEstadoActualiza = "El estado se ha actualizado correctamente";
		private $msjEstadoNoExiste = "El estado no existe";	
		private $msjEstadoEliminadoError = "El estado no se ha podido eliminar";
		private $msjEstadoEliminado = "El estado ha sido eliminado";	


		function __construct($C){
			$this->conexion = $C;

		}
		function nuevoEstado($estado, $clave, $numero){
			$sql = "INSERT INTO estado (estado, clave, numero)
							VALUES ('$estado','$clave',$numero)";

			$result = $this->conexion->consulta($sql);

			if($result)
				{return $this->msjSuccess;}
					
			else
				{return $this->msjWarning;}

		}

		function actualizaEstado($estado,$clave,$numero,$id){
			
			$sql = "UPDATE estado SET estado = '$estado', 
									clave = '$clave',
									numero = '$numero'
							WHERE id_estado = $id";

			$actuliza = $this->conexion->consulta($sql);

				if($actuliza)
					return $this->msjEstadoActualiza;
				else 
					return $this->msjEstadoActualizaError;
			

		}
		function eliminaEstado($id){
			$existe = $this->existeEstado($id);

			if(!$existe){
				return $this->msjEstadoNoExiste;

			}
			else{
				$query = "DELETE FROM estado WHERE id_estado = '$id' ";
				$borrar = $this->conexion->consulta($query);

				if ($borrar)
					return $this->msjEstadoEliminado;	
				
				else
					return $this->msjEstadoEliminadoError;
			}	

		}

		function existeEstado($id){

			$query = "SELECT * FROM estado WHERE id_estado = '$id'";
			$existe = $this->conexion->consulta($query);

			$num = $existe->num_rows;
			if ( $num == 0)
				return false;			
			
			else 
				return true;

		}
	}




 ?>