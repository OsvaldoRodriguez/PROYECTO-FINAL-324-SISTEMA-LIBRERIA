<?php 
include "conexion.inc.php";

if(!isset($_SESSION)){ // si no ha iniciado sesion 
	session_start(); 
} 

// ahora tenemos que registrar una compra y el precio


// aqui hay que actualizar un flujo para que vaya a flujo 2 o 4 (cajas)
$sql ="insert into flujotramite(flujo, proceso, nro_tramite, fechaini, fechafin, usuario, usuario_tarea) ";
$sql .= "values('F2', 'P1','".$nro_tramite."', '".$fecha_actual."', NULL , 'AlanCaja', '".$_SESSION['usuario']."' ); ";
// echo $sql;
mysqli_query($con, $sql);
?>