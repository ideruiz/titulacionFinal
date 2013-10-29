<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

    <title> Vista Previa - Titulacion</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type = "text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./estilos/style_verExportables.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptConfig.js"></script>
    <script type="text/javascript" src="./jQuery/scriptExportables.js"></script>

</head>

<body>

  	<?php 

  		include_once("Clases/Conexion.php");
  		$conexion = new Conexion();

      $count=0;
  	 ?>

    <div id="todo">

      <div id="div_regresar3">
            <div id="botonatras" style="cursor:pointer">  <div id="textoatras">Atrás</div>      </div>    

            <div id="iconoatras" style="cursor:pointer">  <img src="./iconos/back.png"> </div>
      </div>

      <div class="btn-descargar">  
          <input class="btn btn-large btn-primary" id="btn-descargarHist" type="button" value="Descargar" >
      </div>

      <div id="aviso"></div>

	   <div id="tabla" >
      		<table class="table table-hover"  id="tabla" border = "1" overflow:"scrol">
                    <thead style="background-color: #10151C; color:white">
                      <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th>Título</th>
                        <th>Nombre del Rector</th>
                        <th>Campus y Fecha de Expedición de título</th>
                        <th>Libro</th>
                        <th>Foja</th>
                        <th>CURP</th>
                        <th>Estudios de Bachillerato</th>
                        <th>Periodo</th>
                        <th>Entidad Federativa</th>
                        <th>Institución</th>
                        <th>Carrera</th>
                        <th>Periodo</th>
                        <th>Entidad Federativa</th>
                        <th>Fecha de Examen</th>
                        <th>Lugar y fecha de la Certificación</th>
                        <th>Administración Escolar</th>

                      </tr>
                    </thead>

                    <tbody style="background-color:white">
                      <?php  
                    		$sql = "SELECT * FROM historial";
                    		$result = $conexion->consulta($sql);

                    		while($row = mysqli_fetch_array($result)){
                          $count = $count + 1;
                    			$nombre = $row['nombre']." ".$row['a_paterno']." ".$row['a_materno'];
                    			ECHO "<tr>
                    					<td > $count</td>
                    					<td width=50> $row[tipo_titulacion]</td>
                    					<td width=370> $nombre</td>
                    					<td width=540> $row[titulo]</td>
                    					<td width=180> $row[nombre_rector]</td>
                    					<td width=400> $row[exp_titulo]</td>
                    					<td width=40> $row[libro]</td>
                    					<td width=40> $row[foja]</td>
                    					<td width=90> $row[curp]</td>
                    					<td width=540> $row[nombre_bachillerato]</td>
                    					<td width=50> $row[periodo_bachillerato]</td>
                    					<td width=90> $row[entidad_bachillerato]</td>
                    					<td width=150> $row[institucion]</td>
                    					<td width=470> $row[carrera]</td>
                    					<td width=80> $row[periodo_carrera]</td>
                    					<td width=90> $row[entidad_institucion]</td>
                    					<td width=70> $row[examen_profesional]</td>
                    					<td width=430> $row[certificacion]</td>
                    					<td width=200> $row[administracion_escolar]</td>
                    				</tr>";
                    		}
                    	?>                
                    </tbody>
          </table>
      </div>
      
	   </div>


</body>

</html>