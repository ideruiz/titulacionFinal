<html>

<!--
*@Sistema de titulación UAO
*@versión: 3.0      
*@modificado: 14 de Septiembre del 2013
*@autor back-end: Saúl David López Delgado
*@autor front-end: Gerardo Ideyoshi Ruiz Ventura
-->

<head>

    <title> Usuarios </title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./estilos/style_form_carreras.css">

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditarUsuario.js"></script>

</head>

<body>

      <?php 
        include_once('Clases/Conexion.php');
        $conexion = new Conexion();
      ?>


      <div style="background:white">
        <table class="table table-hover table-condensed" border = "1">
                  <thead>
                    <tr style = "font-weight: bold; background: black; color:white;">
                      <th>Usuario</th>
                      <th>Rol</th>
                      <th><center>Edicion</center></th>
                      <th><center>Eliminar</center></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                      $sql="SELECT * FROM usuario";
                      $result = $conexion->consulta($sql);

                      while ($usuario = mysqli_fetch_array($result)){
                        $user=$usuario['id_usurio'];
                        $form="form";
                        $form = $form.$user;

                        $sql2 = "SELECT nombre_rol FROM rol WHERE id_rol = '$usuario[fk_rol]'";
                        $res = $conexion->consulta($sql2);
                        $rol = mysqli_fetch_array($res);  

      
                        ECHO "<tr>
                              <td >$usuario[nombre_usuario]</td>
                              <td >$rol[nombre_rol]</td>
                              
                              <td> <center>
                                  <input type='hidden' name='$user' value='$user' >
                                  <input class = 'btn btn-warning' type = 'button' value='Editar' id='editaUsuario' onClick='checkEdit(".$user.")' > 
                              </center> </td>

                              <td> <center>
                                  <input type='hidden' name='$user' value='$user'>
                                  <input class = 'btn btn-danger' type = 'button' value='Eliminar' id='eliminaUsuario' onClick='checkDelete(".$user.")'> 
                              </center> </td>
                          </tr>";
                      }
                    ?>
                  </tbody>
                </table>

         </div>

         <!--div id="window"></div>
         <div id="fondo"></div-->
         <div id="aviso"></div>
</body>


</html>
