<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>
	
	<title>Editar Usuario</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

	<link rel="stylesheet" type "text/css" href = "./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./estilos/style_form_editarUsuario.css">

	<script type="text/javascript" src="./jQuery/jQuery.js"></script>
   	<script type="text/javascript" src="./jQuery/scriptRegistro.js"></script>

</head>

<body>

		<?php 
			include_once('Clases/Conexion.php');
			$conexion = new Conexion();

			$id = $_POST['id_usuario'];
			$tipo = $_POST['tipo'];
				
			$sql = "SELECT * FROM usuario WHERE id_usurio = '$id' ";
			$result = $conexion->consulta($sql);

			$usuario = mysqli_fetch_array($result);
		?>

		<div id="todo">

				<div id="div_cerrar">
							<div id="botoncerrar" style="cursor:pointer">	<div id="textocerrar">Cerrar</div>	    </div>    

							<div id="iconocerrar" style="cursor:pointer">	<img src="./iconos/32/cerrar.png">	</div>
				</div>

				<div class="titulo3">Editar usuario: <?php ECHO "$usuario[nombre_usuario]"; ?></div>
			

				<form class="form-horizontal" id = "formulario">

					<input type='hidden' name='tipo_ed' value="<?php ECHO "$tipo"; ?>" >
					<input type='hidden' name='id_usuario_ed' value="<?php ECHO "$id"; ?>" >

					<div class="control-group">
	                    <label class="control-label"> Nombre de Usuario </label>
	                    <div class="controls">
								<input type="text"     name="user_ed" required		id="usuario" value="<?php ECHO "$usuario[nombre_usuario]"; ?>">	
						</div> 
						<div id="avisoUsuario3"></div> 
					</div>

					<div class="control-group">
	                    <label class="control-label"> Contraseña </label>
	                    <div class="controls">
								<input type="password" name="pass_ed" required		id="pass" >
						</div> 	
						<div id="avisoPass3"></div>  
					</div>  
					
					<div class="control-group">
	                    <label class="control-label"> Confirmar contraseña </label>
	                    <div class="controls">
								<input type="password" name="pass2_ed" required 	id="pass2" > 
						</div> 
						<div id="avisoPass23"></div>
					</div>    

					<div class="control-group">
	                    	<label class="control-label"> Rol </label>
	                    	<div class="controls">	
								<?php 
									$sql="SELECT * FROM rol";
									$result = $conexion->consulta($sql);

									$sql2 = "SELECT nombre_rol FROM rol WHERE id_rol = '$usuario[fk_rol]' ";
									$result2 = $conexion->consulta($sql2);
									$r = mysqli_fetch_array($result2);

									ECHO "<select id='roles_ed'>";
										ECHO "<option>".$r['nombre_rol']."</option>";
										while($row=mysqli_fetch_array($result)){
											ECHO "<option name='rol' value='$row[nombre_rol]'>".$row['nombre_rol']."</option>";
										}				
									ECHO "</select>";
								?>		
							</div>						
							<div id="avisoRol3"></div> 
					</div>	

					<div id="div_editar">
	                		<div id="botonguardar" style="cursor:pointer"><div id="textoguardar">Guardar cambios</div></div>    <div id="iconoguardar" style="cursor:pointer"><img src="./iconos/32/guardar.png"></div>
	        		</div>

				</form>

				<div id="aviso2"></div>

		</div>

</body>
</html>