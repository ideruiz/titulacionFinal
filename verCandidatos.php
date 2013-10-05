<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

	<title>Lista de Candidatos</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="language" content="es" />

	<link rel="stylesheet" type = "text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./estilos/style_verCandidatos.css">

</head>

<body>

	<div id="todo">

			<div id="tabla">
				<table class="table table-condensed table-hover " border = "1">
					<thead>
							<tr style = "font-weight: bold; background-color: #10151C; color:white;">
								<td>  				Programa 			</td>	
								<td>  				Descripcion			</td>
								<td width = 65>  	ID					</td>
								<td>  				Alumno				</td>
								<td width = 60>  	Porcentaje Avance 	</td>
								<td width = 60>  	Creditos Avance 	</td>
							</tr>
					</thead>

					<?php

						include_once('Clases/Conexion.php');

						$Conn = new Conexion();

						$datos = "SELECT * FROM alumno";
						$alumno = $Conn->consulta($datos);

						$total = 0;

						while($row = mysqli_fetch_array($alumno)){

							echo'
								<tbody>
									<tr style="font-size:12px; "  > 
										<td valign = middle >'								.$row['programa'].' 			</td>
										<td valign = middle >'								.$row['descripcion'].' 			</td>
										<td valign = middle  style="text-align:center">'	.$row['id_alumno'].' 			</td>
										<td valign = middle >'								.$row['nombre_alumno'].' 		</td>
										<td valign = middle  style="text-align:center">'	.$row['porcentaje_avance'].'%	</td>
										<td valign = middle  style="text-align:center">'	.$row['creditos_avance'].'		</td>
									</tr>
								</tbody>';

							
								$total++;
						}
						echo'
							<tr style="font-size:13px">
								<td colspan = "2" style = "background-color: #10151C; color:white">   <b> Total Candidatos: '.$total .'</b></td>
							</tr>';
						
					?>

				</table>
			</div>
	</div>

</body>
</html>