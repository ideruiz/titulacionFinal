<!--?php

/**
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
*/

session_start(); //Iniciamos la Sesion o la Continuamos

if ($_SESSION['sesion'])
	{
    $actual="Bienvenido: <strong>".$_SESSION['sesion']."</strong><br />"; //Si existe una sesión generamos el mensaje
	}
else
	{
    	header("Location: ./index.html"); //Si no hay sesión, redirecciona al login
	}

?-->

<html>
<head>

	<title> Datos Generales </title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type "text/css" href = "./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./estilos/style_form_datosgral.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptConfig.js"></script>
    <script type="text/javascript" src="./jQuery/scriptConstantes.js"></script>

</head>

<body>

	<div id="todo">
			<div id="div_regresar">
						<div id="botonatras" style="cursor:pointer">	<div id="textoatras">Atrás</div>	    </div>    

						<div id="iconoatras" style="cursor:pointer">	<img src="./iconos/back.png">	</div>
			</div>

			<div class="columnaizq">

				<form class="form-horizontal" method="post">

						<div class="titulo2">Datos generales</div>

						<div class="control-group">
	                            <label class="control-label"> Universidad </label>
	                            <div class="controls">
	                                    <input type = "text" name="universidad" id="universidad" placeholder="Nombre de la Universidad">
	                            </div>
	                    </div>

	                    <div class="control-group">
	                            <label class="control-label"> Entidad </label>
	                            <div class="controls">
	                                    <input type = "text" name="entidad" id="entidad" placeholder="Entidad Federativa de la Universidad">
	                            </div>
	                    </div>

	                    <div class="control-group">
	                            <label class="control-label"> Identificador de la Entidad </label>
	                            <div class="controls">
	                                    <input  onkeypress='return justNumbers(event);' type = "text" name="id_entidad" id="id_entidad" placeholder="20" maxlength="2">
	                            </div>
	                    </div>

	                    <div class="control-group">
	                            <label class="control-label"> Consecutivo de la institucion </label>
	                            <div class="controls">
	                                    <input type = "text" name="c_institucion" id="c_institucion" placeholder="" maxlength="4">
	                            </div>
	                    </div>

	                    <div class="control-group">
	                            <label class="control-label"> Código para Licenciatura y Maestría </label>
	                            <div class="controls">
	                                    <input type = "text" name="LicMaster" id="LicMaster" placeholder="C1" maxlength="2">
	                            </div>
	                    </div>

	                    <div class="control-group">
	                            <label class="control-label"> Rector de la Universidad </label>
	                            <div class="controls">
	                                    <input type = "text" name="rector" id="rector" placeholder="Nombre del Rector">
	                            </div>
	                    </div>

	                    <div class="control-group">
	                            <label class="control-label"> Administracion Escolar </label>
	                            <div class="controls">
	                                    <input type = "text" name="admin_escolar" id="admin_escolar" placeholder="Nombre del Jefe del Departamento">
	                            </div>
	                    </div>

	                    <div class="control-group">
	                            <label class="control-label"> Fecha de Examen Profesional </label>
	                            <div class="controls">
	                                    <input type = "text" name="e_profesional" id="e_profesional" placeholder="Excencion">
	                            </div>
	                    </div>
	            </form>
            </div>

            <div class="columnader">
            	<form class="form-horizontal" method="post">

	                    <div class="control-group">
	                            <label class="control-label"> Lugar de Certificacion </label>
	                            <div class="controls">
	                                    <input type = "text" name="l_certificacion" id="l_certificacion">
	                            </div>
	                    </div>


	                    <div class="control-group">
	                    		<div class="controls">
	                    			<!--DIA-->
									<select name="dia" id="certificacion_dia">
										<?php
											for($d=1;$d<=31;$d++)
											{
												if($d<10)
													$dd = "0" . $d;
												else
													$dd = $d;
												echo "<option value='$dd'>$dd</option>";
											}
										?>
									</select>
									<!--MES-->			
									<select name="mes" id="certificacion_mes">
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
									<select name="anio" id="certificacion_anio">
										<?php
											$tope = date("Y");
											$edad_max = 1;
											$edad_min = 1;
											for($a= $tope - $edad_max; $a<=$tope + $edad_min; $a++)
												echo "<option value='$a' >$a</option>"; 
										?>
									</select>
								</div>
						</div>

						<div class="control-group">
			                            <label class="control-label"> Lugar de Expedicion de Titulo</label>
			                            <div class="controls">
											<input type = "text" size="40"name="l_titulacion" id="l_titulacion">
										</div>
						</div>

						<div class="control-group">
	                    		<div class="controls">
									<!--DIA-->
									<select name="dia" id ="titulacion_dia">
										<?php
											for($d=1;$d<=31;$d++)
											{
												if($d<10)
													$dd = "0" . $d;
												else
													$dd = $d;
												echo "<option value='$dd'>$dd</option>";
											}
										?>
									</select>
									<!--MES-->
									<select name="mes" id ="titulacion_mes">
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
									<select name="anio" id ="titulacion_anio">
										<?php
											$tope = date("Y");
											$edad_max = 1;
											$edad_min = 1;
											for($a= $tope - $edad_max; $a<=$tope + $edad_min; $a++)
												echo "<option value='$a' >$a</option>"; 
										?>
									</select>
								</div>
				</form>
			</div>

			<div id="div_guardar">
                <div id="botonguardar" style="cursor:pointer"><div id="textoguardar">Guardar</div></div>    <div id="iconoguardar" style="cursor:pointer"><img src="./iconos/32/guardar.png"></div>
            </div>

			<div id="aviso"></div>
	</div><!--TODO-->
</body>


<script type="text/javascript">
	function justNumbers(e) {
		var keynum = window.event ? window.event.keyCode : e.which;
		if ( keynum == 8 ) return true;
		return /\d/.test(String.fromCharCode(keynum));
	}
	</script>

</html>