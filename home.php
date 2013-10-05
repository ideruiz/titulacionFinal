<?php

/**
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
*/

	//require_once("Clases/Sesion.php"); 

	//$sesion = new Sesion();

	//$actual = "Bienvenido: <strong>".$_SESSION['sesion']."</strong><br />";
?>

<html>

<head>
	
	<title>Inicio</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type "text/css" href = "./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./estilos/style_home.css">

	<script type="text/javascript" src="./jQuery/jQuery.js"></script>
	<script type="text/javascript" src="./jQuery/scriptHome.js"></script>

</head>


<body>
	<div>

		<!-- DIV DE LA BARRA -->

		<div class="barraestado" align = right>

			<div class="fecha">
					<?php
		 
						$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
						$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		 				echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		 				 
					?>
			</div>

			<div class="cerrar">
				<a href="./cerrarsesion.php"> Cerrar Sesión</a>
			</div>

			<div class="usuario">
				<!--?php echo $actual; ?-->
			</div>

		</div>

		<!-- DIV DEL MENU (BOTONES) -->

		<div class="menus">

			<div id="boton0" class="contboton">
					<div id="btn0" class="botones" style="cursor:pointer">Inicio<span id="icon0" class="imgbtn0"></span></div>
			</div>

			<div id="boton1" class="contboton">
					<div id="btn1" class="botones" style="cursor:pointer">Configuración<span id="icon1" class="imgbtn1"></span></div>
			</div>
			
			<div id="boton2" class="contboton">
					<div id="btn2" class="botones" style="cursor:pointer">Candidatos<span id="icon2" class="imgbtn2"></span></div>
			</div>

			<div id="boton3" class="contboton">
					<div id="btn3" class="botones" style="cursor:pointer">Validaciones<span id="icon3" class="imgbtn3"></span></div>
			</div>

			<div id="boton4" class="contboton">
					<div id="btn4" class="botones" style="cursor:pointer">Titulación<span id="icon4" class="imgbtn4"></span></div>
			</div>

			<div id="boton5" class="contboton">
					<div id="btn5" class="botones" style="cursor:pointer">Exportables<span id="icon5" class="imgbtn5"></span></div>
			</div>

		</div>

		<!-- DIV DEL CONTENIDO -->

		<div class="areacontenido">
				<div id="content"  class="contenido" frameborder="0">

				</div>
		</div>

	</div>

</body>

</html>