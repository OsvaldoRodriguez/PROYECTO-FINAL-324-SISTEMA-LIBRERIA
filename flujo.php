<?php
include "conexion.inc.php";
if(!isset($_SESSION)){ // si no ha iniciado sesion 
	session_start(); 
} 
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
$nro_tramite = $_GET["nro_tramite"];

// echo "lo que esta lleagndo ".$flujo." ".$proceso." ".$nro_tramite."<br/>";
$sql="select * from flujo ";
$sql.="where flujo='".$flujo."' and ";
$sql.="proceso='".$proceso."'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);
$pantalla = $fila["pantalla"];
$tipo = $fila["tipo"];
$rol = $fila['rol'];
// echo "pantalla donde va a ir -> ".$pantalla.".datos.inc.php <br/>";
// para saber si ya hizo un proceso
$sql="select count(*) as cantidad from flujotramite ";
$sql.="where flujo='".$flujo."' and ";
$sql.="proceso='".$proceso."' and ";
$sql.="nro_tramite='".$nro_tramite."'";
$resultado21=mysqli_query($con, $sql);
$fila21=mysqli_fetch_array($resultado21);
$cantidad=$fila21["cantidad"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>libreria</title>
	<style>
		
        .parent { display: grid; grid-template-columns: repeat(12, 1fr); grid-template-rows: repeat(12, 1fr); grid-column-gap: 0px; grid-row-gap: 40px; }
		.div1 { grid-area: 11 / 4 / 13 / 6; }
		.div2 { grid-area: 11 / 8 / 13 / 10; }
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


<form method="GET" action="motor.php">
	<?php 
		// echo "pantalla donde esta -> ".$pantalla.".inc.php <br/>";
		include $pantalla.".datos.inc.php";
		include $pantalla.".inc.php";
	?>
	<input type="hidden" value="<?php echo $flujo;?>" name="flujo"/>
	<input type="hidden" value="<?php echo $proceso;?>" name="proceso"/>
	<input type="hidden" value="<?php echo $nro_tramite;?>" name="nro_tramite"/>
	<input type="hidden" value="<?php echo $pantalla;?>" name="pantalla"/>
	<input type="hidden" value="<?php echo $rol;?>" name="rol"/>
	<input type="hidden" value="<?php echo $tipo;?>" name="tipo"/>
	<!-- <input type="hidden" value="<?php echo $id_pedido_producto;?>" name="id_pedido_producto"/> -->
	<!-- <br/> -->
	
	<?php
		if ($tipo=="C"){
			?>
				<div class="parent">
        			<div class="div1"><input class="boton" type="submit" value="Si" name="Si"/></div>
        			<div class="div2"><input class="boton" type="submit" value="No" name="No"/></div>
    			</div>
			<?php
		}
		else{

			if($cantidad < 1){
			?>
				<div class="parent">
        			<div class="div1"><input class="boton" type="submit" value="Anterior" name="Anterior"/></div>
			<?php
			}else{
			?>		
				<div class="parent">
					<div class="div1"><input class="boton" type="submit" value="Anterior" disabled="disabled" name="Anterior"/></div>	
			<?php
			}
			?>
			
					<div class="div2"><input class="boton" type="submit" value="Siguiente" name="Siguiente"/></div>
				</div>
			<?php
		}
	?>
