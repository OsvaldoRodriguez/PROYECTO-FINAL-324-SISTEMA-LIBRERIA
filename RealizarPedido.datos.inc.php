<?php 
$usuario = $_SESSION['usuario'];
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];

$sql = "select * from libreria.productos ";
// $sql.= "where id_pedido='".$nro_tramite."' ";
// echo $sql;
$consulta = mysqli_query($con, $sql);

?>