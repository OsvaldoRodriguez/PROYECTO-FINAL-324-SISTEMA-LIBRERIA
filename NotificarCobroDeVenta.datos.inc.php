<?php 
$usuario = $_SESSION['usuario'];
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];

$sql = "select * from libreria.pedido_cliente ";
$sql.= "where id_pedido='".$nro_tramite."' ";
// echo $sql;
$consulta = mysqli_query($con, $sql);

?>