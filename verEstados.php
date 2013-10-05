<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

    <title> Estados </title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./estilos/style_form_carreras.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditarEstado.js"></script>

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
                        <th>Numero</th>
                        <th>Clave</th>
                        <th>Estado</th>                  
                        <th>Edicion</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                        $sql="SELECT * FROM estado";
                        $result = $conexion->consulta($sql);
                        while ($estado = mysqli_fetch_array($result)){
                          $edo=$estado['id_estado'];
                          $form="form";
                          $form = $form.$edo;
                          
                          ECHO "<tr>
                                <td>$estado[numero]</td>
                                <td>$estado[clave]</td>
                                <td>$estado[estado]</td>
                                <td><center>
                                    <input type='hidden' name='$edo' value='$edo' >
                                    <input class = 'btn btn-warning' type = 'button' value='Editar' id='editaCarrera' onClick='checkEdit(".$edo.")' >      
                                <center></td>

                                <td><center>
                                    <input type='hidden' name='$edo' value='$edo'>
                                    <input class = 'btn btn-danger' type = 'button' value='Eliminar' id='eliminaCarrera' onClick='checkDelete(".$edo.")'>  
                                <center></td>
                            </tr>";
                        }
                      ?>
                    </tbody>
              </table>

         </div>

     <div id="aviso"></div>
     
</body>

</html>
