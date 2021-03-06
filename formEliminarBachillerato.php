<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

	<title> Eliminar Bachillerato</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type "text/css" href = "./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./estilos/style_form_eliminarBachillerato.css">

	<script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditaBachillerato.js"></script>

</head>

<body>

		<?php  
			include_once('Clases/Conexion.php');

			$Conn = new Conexion();

			$id = $_POST['id_bachillerato'];

			$sql = "SELECT * FROM preparatoria WHERE id_preparatoria = '$id' ";
			$result = $Conn->consulta($sql);

			$Bachillerato = mysqli_fetch_array($result);
		?>

		<div id="todo">

				<div id="div_cerrar">
							<div id="botoncerrar" style="cursor:pointer">	<div id="textocerrar">Cerrar</div>	    </div>    

							<div id="iconocerrar" style="cursor:pointer">	<img src="./iconos/32/cerrar.png">	</div>
				</div>
	
				<div class="titulo3"> ¿Desea eliminar el bachillerato? </div>

				<form class="form-horizontal" id = "formulario" method="post">

						<div class="control-group">
			                    <label class="control-label"> Preparatoria: </label>
								<input type="hidden"  placeholder="<?php ECHO "$id"; ?>"  id="id_preparatoria"  value="<?php ECHO "$Bachillerato[id_preparatoria]"; ?>">
								<div class="txt"><?php ECHO "$Bachillerato[nombre_preparatoria]"; ?></div>
						</div>
					
						<div class="control-group">
				                <label class="control-label"> Entidad: </label>
								<div class="txt"> <?php ECHO "$Bachillerato[entidad_preparatoria]"; ?> </div>
						</div>
						
						<div id="div_eliminar">
					                <div id="botoneliminar" style="cursor:pointer"><div id="textoeliminar">Eliminar</div></div>    <div id="iconoeliminar" style="cursor:pointer"><img src="./iconos/32/cerrar.png"></div>
					    </div>

				</form>


				<div id="aviso2"></div>

		</div>

</body>

</html>