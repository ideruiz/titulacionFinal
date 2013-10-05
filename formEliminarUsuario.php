<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>
	
	<title>Eliminar usuarios</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

	<link rel="stylesheet" type "text/css" href = "./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./estilos/style_form_eliminarUsuario.css">

	<script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptRegistro.js"></script>

</head>

<body>

		<?php 
			include_once('Clases/Conexion.php');
			$conexion = new Conexion();

			$id = $_POST['id_usuario'];
			
			$sql = "SELECT * FROM usuario WHERE id_usurio = '$id' ";
			$result = $conexion->consulta($sql);

			$usuario = mysqli_fetch_array($result);
		?>

		<div id="todo">

				<div id="div_cerrar">
							<div id="botoncerrar" style="cursor:pointer">	<div id="textocerrar">Cerrar</div>	    </div>    

							<div id="iconocerrar" style="cursor:pointer">	<img src="./iconos/32/cerrar.png">	</div>
				</div>
	
				<div class="titulo3"> ¿Desea eliminar al usuario? </div>

				<form class="form-horizontal" id = "formulario">

					<input type="hidden"  id="id_usuario"  value="<?php ECHO "$id"; ?>">

					<div class="control-group">
			                    <label class="control-label">Nombre de Usuario:  <?php ECHO "$usuario[nombre_usuario]"; ?></label>					
					</div>


					<div class="control-group">
			                    <label class="control-label">Rol: <?php 
								$sql="SELECT * FROM rol";
								$result = $conexion->consulta($sql);

								$sql2 = "SELECT nombre_rol FROM rol WHERE id_rol = '$usuario[fk_rol]' ";
								$result2 = $conexion->consulta($sql2);
								$r = mysqli_fetch_array($result2);

								ECHO "<div>".$r['nombre_rol']."</div>";
							?></label>	
															
					<div id="div_eliminar">
			                <div id="botoneliminar" style="cursor:pointer"><div id="textoeliminar">Eliminar</div></div>    <div id="iconoeliminar" style="cursor:pointer"><img src="./iconos/32/cerrar.png"></div>
			        </div>

				</form>

				<div id="aviso2"></div>

		</div>

</body>
</html>