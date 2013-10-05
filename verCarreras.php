<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

    <title> Carreras </title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./estilos/style_form_carreras.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditarCarreras.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditaCarrera.js"></script>

</head>

<body>

      <?php 
        include_once('Clases/Conexion.php');
        $conexion = new Conexion();
      ?>

      <div style="background:white">
            <table class="table table-hover table-condensed" border = "1">
                                <thead>
                                  <tr style = "font-weight: bold; background: #070606; color:white;">
                                    <th>Carrera</th>
                                    <th>Identificador de Area</th>
                                    <th>Identificador de Subarea</th>
                                    <th>Identificador de Nivel</th>
                                    <th>Consecutivo de la Carrera</th>
                                    <th>Edicion</th>
                                    <th>Eliminar</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <?php 
                                    $sql="SELECT * FROM carrera";
                                    $result = $conexion->consulta($sql);
                                    while ($carrera = mysqli_fetch_array($result)){
                                      $lic=$carrera['id_carrera'];
                                      $form="form";
                                      $form = $form.$lic;
                                      
                                      ECHO "<tr>
                                            <td>$carrera[nombre_carrera]</td>
                                            <td width=10>$carrera[i_area]</td>
                                            <td width=10>$carrera[i_subArea]</td>
                                            <td width=10>$carrera[i_nivel]</td>
                                            <td width=10>$carrera[consecutivo]</td>
                                            <td><center>
                                                <input type='hidden' name='$lic' value='$lic' >
                                                <input class = 'btn btn-warning' type = 'button' value='Editar' id='editaCarrera' onClick='checkEdit(".$lic.")' >      
                                            </center></td>
                                            <td><center>
                                                <input type='hidden' name='$lic' value='$lic'>
                                                <input class = 'btn btn-danger' type = 'button' value='Eliminar' id='eliminaCarrera' onClick='checkDelete(".$lic.")'>  
                                            </center></td>
                                            </tr>";
                                    }
                                  ?>
                                </tbody>
              </table>
      </div>

     <div id="aviso"></div>
</body>

</html>
