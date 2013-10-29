	<?php 

		include_once("Clases/Conexion.php");
		$conexion = new Conexion();

    $res = "";

    $file = fopen("Exportables/exportableCertificacion.csv",'w');
 
    $sql = "SELECT * FROM titulacion";
    $result = $conexion->consulta($sql);

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

    $s="|";
    if($file){

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

          fwrite($file,$row['curp'].$s);
          fwrite($file,$a_Pat.$s);
          fwrite($file,$a_Mat.$s);
          fwrite($file,$nombre.$s);

          fwrite($file,$constantes['i_estado_institucion'].$s);
          fwrite($file,llenaCeros($constantes['consecutivo_institucion']).$s);

          fwrite($file,$carrera['i_area'].$s);
          fwrite($file,llenaCeros($carrera['i_subArea']).$s);
          fwrite($file,$carrera['i_nivel'].$s);              					
          fwrite($file,llenaCeros($carrera['consecutivo']).$s);

          fwrite($file,$constantes['codigo_LicMaster'].$s);
          fwrite($file,$titulacion['sexo'].$s);
          fwrite($file,$titulacion['entidad_nacimiento'].$s);
          fwrite($file,$titulacion['fecha_nacimiento'].$s);
          fwrite($file,$cer.$s);
          fwrite($file,$titulacion['pais_radica'].$s);
          fwrite($file,$s);
          fwrite($file,$s.PHP_EOL);
          
        }
        
        fclose($file);
        $res=True;
      }

      else{
        $res=False;
      }    
      ECHO $res;
    
?>
