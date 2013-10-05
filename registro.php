<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>
	
	<title>Registro de usuarios</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

	<link rel="stylesheet" type "text/css" href = "./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./estilos/style_registro.css">

	<script type="text/javascript" src="./jQuery/jQuery.js"></script>
	<script type="text/javascript" src="./jQuery/scriptConfig.js"></script>
  	<script type="text/javascript" src="./jQuery/scriptRegistro.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditarUsuario.js"></script>

</head>

<body>

	<?php 
		include_once('Clases/Conexion.php');
		$conexion = new Conexion();
	?>

	<div id="todo2">

			<div id="div_regresar">
						<div id="botonatras" style="cursor:pointer">	<div id="textoatras">Atrás</div>  </div>    

						<div id="iconoatras" style="cursor:pointer">	<img src="./iconos/back.png">	</div>
			</div>

			<form class="form-horizontal">

				<div class="titulo2">Registro de Usuarios</div>

				<div class="control-group">
	                    <label class="control-label"> Nombre de Usuario </label>
	                    <div class="controls">
								<input type='hidden' name='tipo' value="1" >
								<input type="text"     name="user" required		id="usuario">
						</div>
						<div id="avisoUsuario"></div>
	            </div>

	            <div class="control-group">
	                    <label class="control-label"> Contraseña </label>
	                    <div class="controls">
								<input type="password" name="pass" required		id="pass">	
						</div>
						<div id="avisoPass"></div>   
				</div>
				
				<div class="control-group">
	                    <label class="control-label"> Confirmar contraseña </label>
	                    <div class="controls">
								<input type="password" name="pass2" required 	id="pass2"> 
						</div>
						<div id="avisoPass2"></div>
				</div>   

				<div class="control-group">
	                    <label class="control-label">Rol</label>
	                    <div class="controls">	
							<?php 
								$sql="SELECT * FROM rol";
								$result = $conexion->consulta($sql);

								ECHO "<select id='roles'>";
									ECHO "<option></option>";
									while($row=mysqli_fetch_array($result)){
										ECHO "<option name='rol' value='$row[nombre_rol]'>".$row['nombre_rol']."</option>";
									}				
								ECHO "</select>";
							?>		
						</div>						
						<div id="avisoRol"></div>
				</div> 	

				<div id="aviso"></div>

				<div id="div_guardar">
                		<div id="botonguardar" style="cursor:pointer"><div id="textoguardar">Guardar</div></div>    <div id="iconoguardar" style="cursor:pointer"><img src="./iconos/32/guardar.png"></div>
            	</div>

			</form>
			
			

			<!--VISTA DE CARRERAS-->

          	<div id="tabla_vista"></div>
          	<div id="window"></div>
         	<div id="fondo"></div>

	</div>

</body>

</html>