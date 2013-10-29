<?php
/*
	PekeUpload
	Copyright (c) 2013 Pedro Molina

	Modificado Octubre de 2013 by aSuliitoO
*/

// Define a destination
$targetFolder = 'Archivos/'; // Relative to the root


if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	$nombre = "candidatos.csv";
	$targetPath = dirname(__FILE__) . '/' . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $nombre;
	//$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['file']['name'];
	
	// Validate the file type
	$fileTypes = array('csv'); // File extensions
	$fileParts = pathinfo($_FILES['file']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
	} else {
		echo 'Tipo de archivo Inválido';
	}
}
?>