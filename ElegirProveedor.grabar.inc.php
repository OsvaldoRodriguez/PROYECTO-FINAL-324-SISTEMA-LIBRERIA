<?php 
include "conexion.inc.php";
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];
$tipo = $_GET['tipo'];
$rol = $_GET['rol'];
$pantalla = $_GET['pantalla'];
echo $_GET['proveedor']. " **************fdsfdhola<br/>";

$sql = "select * from libreria.ultimo_producto ";
$sql.= "where id_pedido='".$nro_tramite."' ";
// echo $sql;
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);
$id_producto = $datos['id_producto'];
// echo $id_producto;

// actualizando esos pedidos
$sql = "update libreria.registrar_pedido set id_proveedor='".$_GET['proveedor']."' ";
$sql .= "where id_pedido='".$nro_tramite."' ";
echo $sql;
mysqli_query($con, $sql);
?>