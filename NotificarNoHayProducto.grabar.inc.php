
<?php 

include "conexion.inc.php";
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];

// ubiar el ultimo pedido
$sql = "select * from libreria.ultimo_producto_vendido ";
$sql.= "where id_pedido='".$nro_tramite."' ";

// echo $sql;
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);
$producto_a_devolver = $datos['id_producto'];

// echo $producto_a_devolver;
// hay q eliminar de la base de datos

$sql = "delete from libreria.pedido_cliente where id_producto= ".$producto_a_devolver." and id_pedido='".$nro_tramite."' ";
echo $sql;
mysqli_query($con, $sql);


?>