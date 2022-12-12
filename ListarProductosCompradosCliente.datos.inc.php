<?php 
include "conexion.inc.php";
$usuario = $_SESSION['usuario'];
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];

$sql = "select * from flujotramite where flujo='".$flujo."' and nro_tramite ='".$nro_tramite."'";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);

$usuario_quien_compro = $datos['usuario_tarea'];

$sql = "select * from libreria.pedido_cliente ";
$sql.= "where id_pedido='".$nro_tramite."' ";
// echo $sql;
$consulta = mysqli_query($con, $sql);

?>