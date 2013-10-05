<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

	<title>Editar Estado</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

	<link rel="stylesheet" type "text/css" href = "./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./estilos/style_form_editarEstado.css">

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

		<div id="todo">

				<div id="div_cerrar">
							<div id="botoncerrar" style="cursor:pointer">	<div id="textocerrar">Cerrar</div>	    </div>    

							<div id="iconocerrar" style="cursor:pointer">	<img src="./iconos/32/cerrar.png">	</div>
				</div>

				<div class="titulo3">Editar estado: <?php ECHO "$estado[estado]"; ?></div>

				<form class="form-horizontal" id = "formulario">

					<input type='hidden' name='tipo_ed' value="2" >
					<input type='hidden' name='id_estado_ed' value="<?php ECHO "$id"; ?>" >

					<div class="control-group">
	                    <label class="control-label"> Estado </label>
	                    <div class="controls">
								<input type='text' name='estado_ed' value="<?php ECHO "$estado[estado]"; ?>" >
						</div> 
						<div id='edo'></div>
					</div> 

					<div class="control-group">
	                    <label class="control-label"> Clave </label>
	                    <div class="controls">
								<input type='text' name='clave_ed' value="<?php ECHO "$estado[clave]"; ?>">
						</div> 
						<div id='cl'></div>
					</div> 

					<div class="control-group">
	                    <label class="control-label"> Número</label>
	                    <div class="controls">
								<input type='text' name='numero_ed' value="<?php ECHO "$estado[numero]"; ?>">
						</div> 
						<div id='num'></div>
					</div> 

					<div id="div_editar">
	                		<div id="botonguardar" style="cursor:pointer"><div id="textoguardar">Guardar cambios</div></div>    <div id="iconoguardar" style="cursor:pointer"><img src="./iconos/32/guardar.png"></div>
	        		</div>

				</form>

				<div id='aviso2'></div>
				
		</div>

</body>

</html>