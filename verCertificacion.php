<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

	  <title> Vista Previa - Certificación</title>

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

      function convierteMayus($str){
        return strtr(strtoupper($str),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
      }

      function llenaCeros($str){

        if (strlen($str) == 2){
          return $str;
        } else{
          return '0'.$str;
        }
      }

  	 ?>

      <div id="todo">

          <div id="div_regresar3">
            <div id="botonatras" style="cursor:pointer">  <div id="textoatras">Atrás</div>      </div>    

            <div id="iconoatras" style="cursor:pointer">  <img src="./iconos/back.png"> </div>
          </div>

          <div class="btn-descargar">  
              <input class="btn btn-large btn-primary" id="btn-descargarCed" type="button" value="Descargar" >
          </div>

          <div id="aviso"></div>

      	  <div id="tabla2">
          		<table class="table table-hover" id="tabla2" border = "1">
                        <thead style="background-color: #10151C; color:white;">
                          <tr>
                            <th>CURP</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombre</th>
                            <th>Identificador del estado de la Institución</th>
                            <th>Consecutivo de la Institución</th>
                            <th>Identificador del área de la Carrera</th>
                            <th>Identificador de la sub área de la Carrera</th>
                            <th>Identificador del nivel de la Carrera</th>
                            <th>Consecutivo de la Carrera</th>
                            <th>Tipo de registro</th>
                            <th>Sexo</th>
                            <th>Entidad de Nacimiento</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Fecha de examen profesional</th>
                            <th>País donde radica el profesionista</th>
                            <!-- Campos para postgrados
                              <th>extra 1</th>
                              <th>extra 2</th>
                            -->
                            

                          </tr>
                        </thead>
                        <tbody style="background-color:white">

                          	<?php  


                             /**
                              * @param    string   Obtiene el mes
                              * @return   string   Regrea el valor del mes como numero.
                              */
                              function convierteMes($m){
                                    switch($m){
                                      case "Enero":       $mes = '01'; return $mes; break;
                                      case "Febrero":     $mes = '02'; return $mes; break;
                                      case "Marzo":       $mes = '03'; return $mes; break;
                                      case "Abril":       $mes = '04'; return $mes; break;
                                      case "Mayo ":       $mes = '05'; return $mes; break;
                                      case "Junio":       $mes = '06'; return $mes; break;
                                      case "Julio":       $mes = '07'; return $mes; break;
                                      case "Agosto":      $mes = '08'; return $mes; break;
                                      case "Septiembre":  $mes = '09'; return $mes; break;
                                      case "Octubre":     $mes = '10'; return $mes; break;
                                      case "Noviembre":   $mes = '11'; return $mes; break;
                                      case "Diciembre":   $mes = '12'; return $mes; break;
                                    }                          
                                }

                        		$sql = "SELECT * FROM titulacion";
                        		$result = $conexion->consulta($sql);

                        		while($row = mysqli_fetch_array($result)){                   

                                /**
                                * @var    certificacion     Separa la fecha de certificacion en un array.
                                * La fecha viene en formato: Lugar_de_certificacion, a DD de MM de AAAA;
                                */
                                $certificacion = explode (" ",$row['certificacion']);

                                /**
                                * @var    anioC             Se obtiene el elemento año del array.
                                * @param  $certificación    Se extrae un elemento del array.
                                */
                                $anioC = array_pop($certificacion);

                                /**
                                * @param  $certificación    Se extrae un elemento del array.
                                */
                                array_pop($certificacion);

                                /**
                                * @var    mes               Se obtiene en un String el elemento mes del array.
                                * @param  $certificación    Se extrae un elemento del array.
                                */
                                $mes = array_pop($certificacion);

                                /**
                                * @param  mes                Se envía a la funcion mes el string Mes.
                                * @var    mesC               Se Obtiene el valor del mes en número.
                                */
                                $mesC = convierteMes($mes);
                                array_pop($certificacion);

                                /**
                                * @var    diaC              Se obtiene el elemento dia del array.
                                */
                                $diaC = array_pop($certificacion);

                                /**
                                * @var    cer               Es la fecha de certifcación en el formado AAAAMMDD
                                */
                                $cer =  $anioC.$mesC.$diaC;
                                
                        				$consulta = "SELECT * FROM profesionista WHERE fk_alumno = $row[fk_alumno]";
                        				$res = $conexion->consulta($consulta);
                        				$titulacion = mysqli_fetch_array($res);

                        				$sql_carrera = "SELECT * FROM carrera WHERE nombre_carrera = '$row[carrera]'";
                        				$result_carrera = $conexion->consulta($sql_carrera);
                        				$carrera = mysqli_fetch_array($result_carrera);

                        				$sql_constantes = "SELECT i_estado_institucion,consecutivo_institucion,codigo_LicMaster FROM constantes";
                        				$result_constantes = $conexion->consulta($sql_constantes);
                        				$constantes = mysqli_fetch_array($result_constantes);

                                $a_Pat = convierteMayus($row['a_paterno']);
                                $a_Mat = convierteMayus($row['a_materno']);
                                $nombre = convierteMayus($row['nombre']);

                        			ECHO "<tr>
                        					<td > $row[curp]</td>
                        					<td width=130> $a_Pat</td>
                        					<td width=130> $a_Mat</td>
                        					<td width=150> $nombre</td>

                        					<td width=110> $constantes[i_estado_institucion]</td>
                        					<td width=60> ".llenaCeros("$constantes[consecutivo_institucion]")."</td>

                        					<td width=60> $carrera[i_area]</td>
                        					<td width=110> ".llenaCeros("$carrera[i_subArea]")."</td>
                        					<td width=60> $carrera[i_nivel]</td>              					
                        					<td width=60> ".llenaCeros("$carrera[consecutivo]")."</td>

                        					<td width=60> $constantes[codigo_LicMaster]</td>
                        					<td width=30> $titulacion[sexo]</td>
                        					<td width=60> $titulacion[entidad_nacimiento]</td>
                        					<td width=60> $titulacion[fecha_nacimiento]</td>
                        					<td width=60> $cer </td>
                        					<td width=50> $titulacion[pais_radica]</td>
                                  <!--
                        					<td > - </td>
                        					<td > - </td>
                                  -->
                        				</tr>";
                        		}
                        		?>

                          
                        </tbody>
                      </table>

      	</div>
      
	    </div>



</body>
</html>