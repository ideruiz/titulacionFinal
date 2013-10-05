<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

    <title> Bachilleratos </title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./estilos/style_form_carreras.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditarBachilleratos.js"></script>

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
                      <th>Bachillerato</th>
                      <th>Entidad</th>
                      <th>Edicion</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                      $sql="SELECT * FROM preparatoria";
                      $result = $conexion->consulta($sql);
                      while ($Bachillerato = mysqli_fetch_array($result)){

                        $prepa=$Bachillerato['id_preparatoria'];
                        $form="form";
                        $form = $form.$prepa;
                        
                        ECHO "<tr>
                              <td>$Bachillerato[nombre_preparatoria]</td>
                              <td>$Bachillerato[entidad_preparatoria]</td>
                              <td><center>
                                  <input type='hidden' name='$prepa' value='$prepa' >
                                  <input class = 'btn btn-warning' type = 'button' value='Editar' id='editaPrepa' onClick='checkEdit(".$prepa.")' >      
                              </center></td>

                              <td><center>
                                  <input type='hidden' name='$prepa' value='$prepa'>
                                  <input class = 'btn btn-danger' type = 'button' value='Eliminar' id='eliminaPrepa' onClick='checkDelete(".$prepa.")'>  
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
