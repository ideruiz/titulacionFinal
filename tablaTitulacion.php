<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

	  <title> Lista de Alumnos de Titulacion</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./estilos/style_tablaTitulacion.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptTitulacion.js"></script>

</head>

<body>

    <div id="todo">

          	<?php 
          		include_once('Clases/Conexion.php');
          		$conexion = new Conexion();
          	?>

            <div id="tabla">
              		  <table class="table table-hover" id="tabla" border = "1" style="background:white">
                            <thead>
                                <tr style = "font-weight: bold; background-color: #10151C; color:white;">
                                  <th>Editar</th>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>CURP</th>
                                  <th>Carrera</th>
                                  <th>Periodo</th>
                                  <th>Bachillerato</th>
                                  <th>Periodo</th>                     
                                </tr>
                            </thead>

                            <tbody>
                              	<?php 
                              		$sql="SELECT fk_alumno,nombre,curp,a_paterno,a_materno,carrera,periodo_carrera,nombre_bachillerato,periodo_bachillerato
                              			FROM titulacion";
                              		$result = $conexion->consulta($sql);
                              		while ($row = mysqli_fetch_array($result)){
                                    $alumno=$row['fk_alumno'];
                                    $form="form";
                                    $form = $form.$alumno;
                                    
                              			ECHO "<tr>
                                          <td>
                                              
                                              <input type='hidden' name='$alumno'>
                                              <input id='editartit' class='btn btn-inverse' type='submit' value='Editar' onClick='check($alumno)'>
                                              
                                          </td>
                                  				<td width=50>$alumno</td>
                                  				<td width=360>$row[nombre] $row[a_paterno] $row[a_materno]</td>
                                  				<td width=50>$row[curp]</td>
                                  				<td width=500>$row[carrera]</td>
                                  				<td width=50>$row[periodo_carrera]</td>
                                  				<td width=600>$row[nombre_bachillerato]</td>
                                  				<td width=50>$row[periodo_bachillerato]</td>
                                			</tr>";
                              		}
                              	?>
                            </tbody>

                    </table>

            </div>

           <!--div id="window" class="visible"</div-->
           <div id="window"></div>
           <div id="fondo"></div>           
           <div id="aviso"></div>

    </div>

</body>

</html>