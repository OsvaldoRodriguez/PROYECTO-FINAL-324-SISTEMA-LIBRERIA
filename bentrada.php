<?php
  include "conexion.inc.php";
  if(!isset($_SESSION)){ // si no ha iniciado sesion 
      session_start(); 
  } 
  $usuario = $_SESSION["usuario"];
  $sql="select * from flujotramite ";
  $sql.="where usuario='".$usuario."' and fechafin is null ";
  $resultado=mysqli_query($con, $sql);
  
$fecha_actual =  date('y-m-d h:i:s');
?>

<!DOCTYPE html>
<html>
  <head>

    <title>Procesos Pendientes</title>
    <style>
      thead { background-color: rgba(253, 251, 251, 0.9); }
      html, body{
        background-color: #032E2C;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Cdefs%3E%3CradialGradient id='a' cx='396' cy='281' r='514' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%2300FDFF'/%3E%3Cstop offset='1' stop-color='%23032E2C'/%3E%3C/radialGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='400' y1='148' x2='400' y2='333'%3E%3Cstop offset='0' stop-color='%2303FFFB' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%2303FFFB' stop-opacity='0.5'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' width='800' height='400'/%3E%3Cg fill-opacity='0.5'%3E%3Ccircle fill='url(%23b)' cx='267.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='532.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='400' cy='30' r='300'/%3E%3C/g%3E%3C/svg%3E");
        background-attachment: fixed;
        background-size: cover;
        /* eso es el anterior body */
        margin: 0; 
        font-family: Century Gothic; 
        font-weight: 100;
        height: 10%;
      }
        /* Century Gothic Copperplate Gothic */
        
        h1 {font-family:Century Gothic ; color: #FFFFFF;}
        select { font-family:Century Gothic ;}
        .container { position: absolute; top: 25%; left: 40%; transform: translate(-50%, -50%); }
        .cuadro{ width: 120%; font-size: 40px; border-collapse: collapse; text-align: center; overflow: hidden; box-shadow: 0 0 20px rgba(235, 8, 8, 0.1); background-color: rgba(253, 251, 251, 0.6);}
        table { width: 135%; overflow: hidden; box-shadow: 0 0 20px rgba(235, 8, 8, 0.1);}
        th, td { padding: 9px; background-color: rgba(253, 251, 251, 0.5); color: #141212; }
        th { text-align: center; }
        .color_verde{background-color: #078C31;}
        .color_rojo{background-color: #F01212;}
        .parent { display: grid; grid-template-columns: repeat(12, 1fr); grid-template-rows: repeat(12, 1fr); grid-column-gap: 0px; grid-row-gap: 0px; }
        .div1 { grid-area: 2 / 2 / 9 / 12; }
        .div2 { grid-area: 9 / 3 / 10 / 5; }
        .div3 { grid-area: 9 / 6 / 10 / 8; }
        .div4 { grid-area: 9 / 9 / 10 / 11; }
        .div5 { grid-area: 11 / 6 / 11 / 8; }
        .boton { 
			    border-radius: .5em;
          font-family: "Century Gothic";
          text-transform: uppercase;
          outline: 0;
          background: #05726d;
          width: 100%;
          border: 0;
          padding: 15px;
          color: #FFFFFF;
          font-size: 14px;
          -webkit-transition: all 0.3 ease;
          transition: all 0.3 ease;
          cursor: pointer;
        }
        .boton:hover,.boton:active,.boton:focus {
          border-radius: .5em;
          background: #03445f;
        }
    </style>
</head>
<body>
  <h1 align='center'>TAREAS PENDIENTES DE: <?php echo "<br/>".$usuario; ?></h1>
  <div class="parent">
    <div class="div1">
      <div class="container">
        <table>
          <thead>
            <tr>
              <th>Flujo</th>
              <th>Proceso</th>
              <th>Nro. Tramite</th>
              <th>Fecha de inicio</th>
              <th>Fecha final</th>


              <?php 
                if($_SESSION['rol'] == 'Caja'){
              ?>
                                    <!-- echo "<td>".$fila["usuario_tarea"]."</td>"; -->
                <th> USUARIO </th>
                <th> TAREA </th>
              <?php 
                }
              ?>

              
                <th>Estado</th>
              </tr>
          </thead>
          <tbody>
            <?php 
              while ($fila = mysqli_fetch_array($resultado))
              {
                echo "<tr>";
                echo "<th>".$fila["Flujo"]."</th>";
                echo "<th>".$fila["proceso"]."</th>";
                echo "<th>".$fila["nro_tramite"]."</th>";
                echo "<th>".$fila["fechaini"]."</th>";
                if(isset($fila["fechafin"])){
                  echo "<th> Terminado </th>";
                }else{
                  echo "<th> No Terminado </th>";
                }
                if($_SESSION['rol'] == 'Caja'){
                  echo "<th>".$fila["usuario_tarea"]."</th>";
                  if($fila['usuario_tarea'] == "FuryLibreria"){
                    echo "<th class='color_rojo'> PAGAR </th>";
                  }else{
                    echo "<th class='color_verde'> COBRAR </th>";
                  }
                }
                echo "<th><a href='flujo.php?flujo=".$fila["Flujo"]."&proceso=".$fila["proceso"]."&nro_tramite=".$fila['nro_tramite']."'> Editar </td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>


    <?php 
        $sql = "select * from usuario ";
        $sql.= "where descripcion='".$usuario."'";
        $consulta = mysqli_query($con, $sql);
        $datos = mysqli_fetch_array($consulta);

        $id_usuario = $datos['id'];

        // ahora busacndo que idrol tiene
        $sql = "select * from rolusuario ";
        $sql.= "where IdUsuario='".$id_usuario."'";
        $consulta = mysqli_query($con, $sql);
        $datos = mysqli_fetch_array($consulta);

        $id_usuario_rol = $datos['IdRol'];

        if($id_usuario_rol == 1 or $id_usuario_rol == 3){

          if($id_usuario_rol == 1){
            ?>
              <div class='div5'>
                <form  method="GET" action="Estadisticas.php">
                  <button class="boton" type='submit' name='estadisticas' value = 'estadisticas'> Estadisticas </button>
                </form>
              </div>
            <?php 
          }

          $numero_tramite = 1000;
          $sql = "select * from flujotramite ";
          $consulta = mysqli_query($con, $sql);
          $datos = mysqli_fetch_array($consulta);

          if(isset($datos['nro_tramite'])){ // si existe algun tramite 


            // echo "existe";
            $sql_p = "select max(nro_tramite) as cantidad from flujotramite ";
            // echo $sql_p;
            $consulta_p = mysqli_query($con, $sql_p);
            $datos = mysqli_fetch_array($consulta_p);
            $numero_tramite = (int)$datos['cantidad'] + 1;
          }else{
            // echo "no existe";
            $numero_tramite = 1000;
          }

          $nuevo_flujo;
          if($id_usuario == 1){
            $nuevo_flujo = "F1";
          }else{
            $nuevo_flujo = "F3";
          }
          $nuevo_proceso = "P1";
          $nuevo_tramite = $numero_tramite;
          $nueva_fecha = $fecha_actual;
          $nuevo_usuario = $usuario;
    ?>
    
    <div class="div2">
      <form  method="GET" action="InitCrearFlujo.php">
        <input type="hidden" name="flujo" value="<?php echo $nuevo_flujo; ?>"/>
        <input type="hidden" name="proceso" value="<?php echo $nuevo_proceso; ?>"/>
        <input type="hidden" name="nro_tramite" value="<?php echo $nuevo_tramite; ?>"/>
        <input type="hidden" name="fechaini" value="<?php echo $nueva_fecha; ?>"/>
        <input type="hidden" name="usuario" value="<?php echo $nuevo_usuario; ?>"/>
        <button class="boton" type='submit' name='crear' value = 'crear'> Nuevo </button>
      </form>
    </div>

    

    
    <div class="div4">
      <form  method="GET" action="InitBorrarFlujo.php">
        <input type="hidden" name="flujo" value="<?php echo $nuevo_flujo; ?>"/>
        <input type="hidden" name="proceso" value="<?php echo $nuevo_proceso; ?>"/>
        <input type="hidden" name="nro_tramite" value="<?php echo $nuevo_tramite; ?>"/>
        <input type="hidden" name="fechaini" value="<?php echo $nueva_fecha; ?>"/>
        <input type="hidden" name="usuario" value="<?php echo $nuevo_usuario; ?>"/>
        <button type='submit' class="boton" name='borrar' value = 'borrar'> Borrar </button>
      </form>
    </div>
    <?php
      }
    ?>

    <div class="div3">
      <form action="index.php">
        <button class="boton" type="submit" value="Volver" name = "Volver">Volver</button>
      </form>
    </div>

  </div>
</body>
</html>

