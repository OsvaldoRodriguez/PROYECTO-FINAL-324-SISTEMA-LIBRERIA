<?php 

include "conexion.inc.php";
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];

// ahora hay que actualizar 
$id_producto_comprado = $_GET['id_producto_comprado'];
$cantidad = $_GET['cantidad'];
// echo $_GET['id_producto_comprado']. "<br/>";

// tenemos que encontrar el id_del usuario
$sql = "select * from usuario ";
$sql.= "where descripcion='".$_SESSION['usuario']."'";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);
$id_cliente = $datos['id'];
$fecha_actual =  date('y-m-d h:i:s');
// necesitamos saber los atributos del producto

$sql = "select * from libreria.productos ";
$sql.= "where id_producto='".$id_producto_comprado."' ";
$consulta = mysqli_query($con, $sql);
$datos_producto = mysqli_fetch_array($consulta);
// print_r($datos_producto);
// echo "<br/>";
$sql = "insert into libreria.pedido_cliente ( id_cliente, id_producto, cantidad, precio_unitario, fecha, id_pedido) values (".$id_cliente.", ".$id_producto_comprado.", ".$cantidad.", ".$datos_producto['precio_unitario'].", '".$fecha_actual."', '".$nro_tramite."');";
// echo $sql;
mysqli_query($con, $sql);


// actualizar el ultimo pedido
$sql = "select count(*) as cantidad from libreria.ultimo_producto_vendido ";
$sql .= "where id_pedido='".$nro_tramite."' ";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);

$cantidad =  $datos['cantidad'];
echo $cantidad;

if($cantidad > 0){
    $sql = "update libreria.ultimo_producto_vendido set id_producto='".$id_producto_comprado." ' ";
    $sql .= "where id_pedido='".$nro_tramite."' ";
    $sql .= "";
}else{
    $sql = "insert libreria.ultimo_producto_vendido values ('".$nro_tramite."','".$id_producto_comprado."')";
}

mysqli_query($con, $sql);


?>