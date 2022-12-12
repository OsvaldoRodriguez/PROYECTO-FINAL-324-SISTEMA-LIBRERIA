<?php 
include "conexion.inc.php";
$usuario = $_SESSION['usuario'];
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];

// crear un nuevo pedido a proveedor
// $sql = "select * from ";
// productos de la libreria
$sql = "select * from libreria.productos ";
$sql .= " where cantidad <= '100000'";

// $sql = "select max(nro_tramite) from flujotramite ";
// $sql = "where "
$consulta = mysqli_query($con, $sql);



?>