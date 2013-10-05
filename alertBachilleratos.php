<?php 
include_once('Clases/classBachillerato.php');

	$Conn = new Conexion();

	$id 	= $_POST["id"];
	$Bachillerato = new Bachillerato($Conn);

	if($_POST['tipo'] == "1"){
		
		$prepa 	= $_POST["prepa"];
		$entidadPrepa 	= $_POST["entidadPrepa"];
		
		if($Bachillerato){

			$prepa = $Bachillerato->actualizarBachillerato($prepa,$entidadPrepa,$id);

			if($prepa){
				ECHO "<div class='avisoexito'>Bachillerato actualizado correctamente</div>";
			}
			else{
				ECHO "<div class='avisofallo'>Algo salio mal, intente otra vez</div>";
			}
		}
	}

	if($_POST['tipo'] == "2"){

		$elimina = $Bachillerato->eliminarBachillerato($id);

		if($elimina){
			ECHO "Bachillerato eliminado";
		}
		else{
			ECHO "No se pudo eliminar el Bachillerato";
		}
	}


?>