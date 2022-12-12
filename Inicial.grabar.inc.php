<?php 

include "conexion.inc.php";

$usuario = $_SESSION['usuario'];
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];
$id_producto = $_GET['id_producto'];
$cantidad_producto = $_GET['cantidad_producto'];
$fecha_actual =  date('y-m-d h:i:s');
echo "ID INICIAL ".$id_producto . " ".$cantidad_producto." |flujo ".$flujo." <br/>";

$sql = "select count(*) as cantidad from libreria.ultimo_producto ";
$sql .= "where id_pedido='".$nro_tramite."' ";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);

$cantidad =  $datos['cantidad'];
echo $cantidad;

if($cantidad > 0){
    $sql = "update libreria.ultimo_producto set id_producto='".$id_producto." ' ";
    $sql .= "where id_pedido='".$nro_tramite."' ";
    $sql .= "";
}else{
    $sql = "insert libreria.ultimo_producto values ('".$nro_tramite."','".$id_producto."')";
}

mysqli_query($con, $sql);

// ahora hay que actualizar en la base de datos con el pedido

$sql = "insert into libreria.registrar_pedido ( id_prod_prov, id_proveedor, cantidad, fecha, id_pedido) values($id_producto,'',$cantidad_producto,'".$fecha_actual."', '".$nro_tramite."' );";
// echo $sql;
mysqli_query($con, $sql);

?>