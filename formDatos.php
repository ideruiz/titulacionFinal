<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

	<title> Datos Personales Titulación </title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type "text/css" href = "./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./estilos/style_form_datostit.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptDatos.js"></script>
    
</head>

<body>
		<?php 
			include_once('Clases/Conexion.php');
			$conexion = new Conexion();
			//var_dump($_POST);
			$alumno = $_POST['alumno'];
			
		?>

		<div id="todo">

				<div id="div_regresar">
						<div id="botonatras" style="cursor:pointer">	<div id="textoatras">Atrás</div>	    </div>    

						<div id="iconoatras" style="cursor:pointer">	<img src="./iconos/back.png">	</div>
				</div>
				
				<div class="titulo2">
					<?php 
						//$array = array_keys($_POST);
						//$alumno= $array['0'];
						//var_dump($_POST);
						//$alumno= $_POST['alumno'];
						ECHO "<div id='Alumno'>$alumno</div>";

						$sql="SELECT nombre, a_paterno, a_materno FROM titulacion WHERE fk_alumno='$alumno'";			
						$result=$conexion->consulta($sql);

						while ($row=mysqli_fetch_array($result)){
							ECHO "$row[nombre] $row[a_paterno] $row[a_materno]";
						}	
					 ?>
				</div>


				<form class="form-horizontal" id = "formulario" method="post">

						<div class="control-group">

		                  		<fieldset><legend> Información Personal</legend>

		                  			<div class="columnaizq">

			                  			<div class="control-group">
				                  			<label class="control-label"> Nombre(s) </label>
				                  			<div class="controls">
												<input type="text" placeholder="" name="nombre" id="name">
											</div> 	
										</div> 

										<div class="control-group">
				                  			<label class="control-label"> Apellido Paterno </label>
				                  			<div class="controls">
													<input type="text" placeholder="" name="paterno" id="paterno">
											</div> 	
										</div>

										<div class="control-group">
				                  			<label class="control-label"> Apellido Materno </label>
				                  			<div class="controls">
													<input type="text" placeholder="" name="materno" id="materno">
											</div> 	
										</div>

										<div class="control-group">
				                  			<label class="control-label"> CURP </label>
				                  			<div class="controls">
													<input type="text" placeholder="" name="curp" id="curp" maxlength='18'>
											</div> 	
										</div>

									</div>

									<div class="columnader">

										<div class="control-group">
				                  			<label class="control-label" id="ent">Entidad de Nacimiento</label>	
				                  			<div class="controls">	
													<?php 
														$sql="SELECT estado,numero FROM estado";
														$result = $conexion->consulta($sql);

														ECHO "<select id='entidad'>";
															ECHO "<option>Estado</option>";
															while($row=mysqli_fetch_array($result)){
																ECHO "<option name='entidad' value='$row[numero]'>".$row['estado']."</option>";
															}				
														ECHO "</select>";
													?>
											</div> 	
										</div>

										<div class="control-group">
				                  			<label class="control-label" id="cod"> Código del país </label>	
				                  			<div class="controls">
													<input type="text" onkeypress='return justNumbers(event);' placeholder="003" name="p_radica" id="p_radica" maxlength="3">
											</div> 	
										</div>

										<div class="control-group">
				                  			<label class="control-label" id="nac"> Fecha de Nacimiento </label>	
				                  			<div class="controls">
				                  					<!--DIA-->
													<select name="dia" id="nacimiento_dia">
														<?php
															for($d=1;$d<=31;$d++){
																if($d<10)
																	$dd = "0" . $d;
																	else
																		$dd = $d;
																	echo "<option value='$dd'>$dd</option>";
																}
															?>
													</select>
													<!--MES-->	
													<select name="mes" id="nacimiento_mes">
														<?php
															for($m = 1; $m<=12; $m++)
															{
																if($m<10)
																	$me = "0" . $m;
																else
																	$me = $m;
																switch($me)
																{
																	case "01": $mes = "Enero"; break;
																	case "02": $mes = "Febrero"; break;
																	case "03": $mes = "Marzo"; break;
																	case "04": $mes = "Abril"; break;
																	case "05": $mes = "Mayo"; break;
																	case "06": $mes = "Junio"; break;
																	case "07": $mes = "Julio"; break;
																	case "08": $mes = "Agosto"; break;
																	case "09": $mes = "Septiembre"; break;
																	case "10": $mes = "Octubre"; break;
																	case "11": $mes = "Noviembre"; break;
																	case "12": $mes = "Diciembre"; break;			
																}
																echo "<option value='$me'>$mes</option>";
															}
														?>
													</select> 
													<!--AÑO-->
													<select name="anio" id="nacimiento_anio">
														<?php
															$tope = date("Y");
															$edad_max = 45;
															$edad_min = 18;
															for($a= $tope - $edad_max; $a<=$tope - $edad_min; $a++)
																echo "<option value='$a'>$a</option>"; 
														?>
													</select>
											</div>

											<!-- Termina desplegable  de Fechas-->

											<div class="control-group">
				                  					<label class="control-label" id="s"> Sexo </label>
				                  					<div class="controls">
					                  					<label class="radio" id="h2">
																<input type="radio" id="h" onclick="verificaSexo(1)">Hombre
														</label>

														<label class="radio" id="m2">
															<input type="radio" id="m" onclick="verificaSexo(2)">Mujer
														</label>
													</div>
											</div>
									</div>
								</fieldset>
						</div>
				</form>

				<form class="form-horizontal" id = "formulario" method="post">

						<div class="control-group">

		                  		<fieldset><legend> Bachillerato </legend>

		                  			<div class="columnaizq">

			                  			<div class="control-group">
				                  			<label class="control-label"> Preparatoria </label>
				                  			<div class="controls">
												<?php 
													$sql="SELECT nombre_preparatoria,entidad_preparatoria FROM Preparatoria";
													$result = $conexion->consulta($sql);

													ECHO "<select id='prepas'>";
														ECHO "<option>Preparatoria</option>";
														while($row=mysqli_fetch_array($result)){
															ECHO "<option name='prepa' value='$row[nombre_preparatoria]".","."$row[entidad_preparatoria]'>".$row['nombre_preparatoria']." - "."$row[entidad_preparatoria]"."</option>";
														}				
													ECHO "</select>";
												?>
											</div> 	
										</div> 

										<div class="control-group">
				                  			<label class="control-label"> Año de Inicio </label>
				                  			<div class="controls">
													<input onkeypress='return justNumbers(event);' id='prepaI' name='prepaI' maxlength="4">
											</div> 	
										</div> 

										<div class="control-group">
				                  			<label class="control-label"> Año de Término </label>
				                  			<div class="controls">
													<input onkeypress='return justNumbers(event);' id='prepaF' name='prepaF' maxlength="4">
											</div> 	
										</div> 
									</div>
								</fieldset>
						</div>
				</form>


				<form class="form-horizontal" id = "formulario" method="post">

						<div class="control-group">

		                  		<fieldset><legend> Titulación </legend>

		                  			<div class="columnaizq">

			                  			<div class="control-group">
				                  			<label class="control-label"> Licenciado en </label>
				                  			<div class="controls">	
												<?php 
													$sql="SELECT nombre_carrera FROM carrera";
													$result = $conexion->consulta($sql);

													ECHO "<select id='carreras'>";
														ECHO "<option>Licenciatura</option>";
														while($row=mysqli_fetch_array($result)){
															ECHO "<option name='carrera' value='$row[nombre_carrera]'>".$row['nombre_carrera']."</option>";
														}
													ECHO "</select>";
												?>
											</div> 	
										</div> 

										<div class="control-group">
				                  			<label class="control-label"> Año de Inicio </label>
				                  			<div class="controls">		
													<input onkeypress='return justNumbers(event);' id='carreraI' name='carreraI' maxlength="4">
											</div> 	
										</div> 

										<div class="control-group">
				                  			<label class="control-label"> Año de Término </label>
				                  			<div class="controls">
													<input onkeypress='return justNumbers(event);' id='carreraF' name='carreraF' maxlength="4">
											</div> 	
										</div>

										<div class="control-group">
				                  					<label class="control-label" id="tt"> Tipo de Titulación: </label>
				                  					<div class="controls">
					                  					<label class="radio" id="uno1">
																<input type="radio" id="uno" onclick="verificaCheckbox(1)">Normal
														</label>

														<label class="radio" id="dos2">
															<input type="radio" id="dos" onclick="verificaCheckbox(2)">Mencion Honorífica
														</label>
													</div>
											</div>
									</div>
								</fieldset>
						</div>
				</form>

				<form class="form-horizontal" id = "formulario" method="post">

						<div class="control-group">

		                  		<fieldset><legend> Control </legend>

		                  			<div class="columnaizq">

			                  			<div class="control-group">
				                  			<label class="control-label" id="foja1"> Foja </label>
				                  			<div class="controls">		
													<input onkeypress='return justNumbers(event);' type="text" placeholder="" id="foja" name="foja" maxlength="3">
											
				                  			<label class="control-label" id="libro1"> Libro </label>
				                  			<div class="controls">		
													<input onkeypress='return justNumbers(event);' type="text" placeholder="" id="libro" name="libro" maxlength="3">
											</div> 	
										</div> 
									</div>
								</fieldset> 
						</div>
				</form>

				<form class="form-horizontal" id = "formulario" method="post">

						<div class="control-group">

		                  		<fieldset><legend> Información General </legend>

		                  			<div class="columnaizq">

			                  			<div class="control-group">
				                  			<label class="control-label"> Institución: </label>
				                  				<div class="controls">
												<?php 
													$sql="SELECT institucion FROM constantes";
													$result=$conexion->consulta($sql);
													$dato=mysqli_fetch_array($result);
													ECHO "<div class='txt'>$dato[0]</div>";
												?>
												</div>
										</div> 

										<div class="control-group">
				                  			<label class="control-label"> Entidad: </label>
				                  				<div class="controls">
												<?php 
													$sql="SELECT entidad_institucion FROM constantes";
													$result=$conexion->consulta($sql);
													$dato=mysqli_fetch_array($result);
													ECHO "<div class='txt'>$dato[0]</div>";
												?>
												</div>
										</div> 

										<div class="control-group">
				                  			<label class="control-label"> Rector: </label>
				                  				<div class="controls">
												<?php 
													$sql="SELECT nombre_rector FROM constantes";
													$result=$conexion->consulta($sql);
													$dato=mysqli_fetch_array($result);
													ECHO "<div class='txt'>$dato[0]</div>";
												?>
												</div>
										</div> 

										<div class="control-group">
				                  			<label class="control-label"> Examen Profesional: </label>
				                  				<div class="controls">
												<?php 
													$sql="SELECT ex_profesional FROM constantes";
													$result=$conexion->consulta($sql);
													$dato=mysqli_fetch_array($result);
													ECHO "<div class='txt'>$dato[0]</div>";
												?>
												</div>
										</div>

										<div class="control-group">
				                  			<label class="control-label"> Administración Escolar: </label>
				                  				<div class="controls">
												<?php 
													$sql="SELECT admin_escolar FROM constantes";
													$result=$conexion->consulta($sql);
													$dato=mysqli_fetch_array($result);
													ECHO "<div class='txt'>$dato[0]</div>";
												?>
												</div>
										</div>

										<div class="control-group">
												<?php 
													ECHO '<input type="button" id="activar" value="Habilitar Campos">';
												?>
										</div>

										<div class="control-group">
				                  			<label class="control-label">Lugar y Fecha de Certificación</label>
				                  				<div class="controls">
												<?php 
													$sql="SELECT exp_certificado FROM constantes";
													$result=$conexion->consulta($sql);
													$dato=mysqli_fetch_array($result);
													ECHO "<input type='text' placeholder='$dato[0]' id='certificacion' name='certificacion' disabled>";
												?>
												</div>
										</div>

										<div class="control-group">
				                  			<label class="control-label">Campus y Fecha de Expedición de Título</label>
				                  				<div class="controls">
												<?php 
													$sql="SELECT exp_titulo FROM constantes";
													$result=$conexion->consulta($sql);
													$dato=mysqli_fetch_array($result);
													ECHO "<input type='text' placeholder='$dato[0]' id='titulacion' name='titulacion' disabled>";
												?>
												</div>
										</div>
									</div>
								</fieldset> 
						</div>

						<div id="div_guardar">
			                <div id="botonguardar" style="cursor:pointer"><div id="textoguardar">Guardar</div></div>    <div id="iconoguardar" style="cursor:pointer"><img src="./iconos/32/guardar.png"></div>
			            </div>
				</form>

		<div id="aviso"></div>

</body>
<script type="text/javascript">
	function justNumbers(e) {
		var keynum = window.event ? window.event.keyCode : e.which;
		if ( keynum == 8 ) return true;
		return /\d/.test(String.fromCharCode(keynum));
	}

	function verificaCheckbox(box){
		var uno=document.getElementById("uno");		
		var dos=document.getElementById("dos");

		if ( uno.checked==true && box=="1"){
			 dos.checked=false;
		}
		if ( dos.checked==true && box=="2"){
			uno.checked=false;
		}
	}

	function verificaSexo(s){

		var hombre=document.getElementById("h");		
		var mujer=document.getElementById("m");

		if ( hombre.checked==true && s=="1"){
			 mujer.checked=false;
		}
		if ( mujer.checked==true && s=="2"){
			hombre.checked=false;
		}
	}



</script>
</html>