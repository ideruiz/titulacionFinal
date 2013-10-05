<html>
<head>
	<title>Catálogo de Estados</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta name="language" content="es" />

	    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
	    <script type="text/javascript" src="./jQuery/scriptEstados.js"></script>

</head>
<body>
	<?php  
		include_once('Clases/Conexion.php');

		$Conn = new Conexion();

		$id = $_POST['id_estado'];

		$sql = "SELECT * FROM estado WHERE id_estado = '$id' ";
		$result = $Conn->consulta($sql);

		$estado = mysqli_fetch_array($result);
	?>

	<h1><?php ECHO "$estado[estado]"; ?> </h1>

	<input type='hidden' name='tipo' value="2" >
	<input type='hidden' name='id_estado' value="<?php ECHO "$id"; ?>" >

	<label>Estado</label>
	<input type='text' name='estado' value="<?php ECHO "$estado[estado]"; ?>" >
	<div id='edo'></div>

	<label>Clave</label>
	<input type='text' name='clave' value="<?php ECHO "$estado[clave]"; ?>">
	<div id='cl'></div>

	<label>Número</label>
	<input type='text' name='numero' value="<?php ECHO "$estado[numero]"; ?>">
	<div id='num'></div>

	<input type='button' id='enviar' value='Guardar'>

	<div id='aviso'></div>


</body>
</html>