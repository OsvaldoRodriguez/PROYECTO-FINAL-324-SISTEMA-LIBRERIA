<?php 

$usuario = $_SESSION['usuario'];
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];

$sql = "select * from libreria.pedido_cliente ";
$sql.= "where id_pedido='".$nro_tramite."' ";
// echo $sql;
$consulta = mysqli_query($con, $sql);

$precio_total = 0;
while($datos = mysqli_fetch_array($consulta)){

    // hay que saber el nombre
    $sql_p = "select * from libreria.productos ";
    $sql_p.= "where id_producto=".$datos['id_producto'];
    $consulta_p = mysqli_query($con, $sql_p);
    $datos_p = mysqli_fetch_array($consulta_p);

    // tenemos que actualizar stock
    $sql_con = "select * from libreria.productos ";
    $sql_con.= "where id_producto=".$datos['id_producto'];
    echo $sql_con;
    $con_con = mysqli_query($con, $sql_con);
    $datos_con = mysqli_fetch_array($con_con);

    $cantidad_productos = $datos_con['cantidad'];

    echo "*** cantiddad ".$cantidad_productos."<br/>";

    $actual = $cantidad_productos - $datos['cantidad'];
    echo $actual."<br/>";

    $sql_c = "update libreria.productos set cantidad=".$actual." ";
    $sql_c .= "where id_producto=".$datos['id_producto']." ";
    // echo $sql_c;
    mysqli_query($con, $sql_c);
    // print_r($datos_p);
    // echo "<tr>"; 
    // echo "<td>".$datos['id_producto']."</td>";
    // echo "<td>".$datos_p['nombre']."</td>";
    // echo "<td>".$datos['cantidad']."</td>";
    // echo "<td>".$datos['fecha']."</td>";
    // echo "<td>".$datos['precio_unitario']." Bs.</td>";
    
    // echo "<td>".$datos['precio_unitario'] * $datos['cantidad']." Bs. </td>";
    // echo "</tr>";
    $precio_total += $datos['precio_unitario'] * $datos['cantidad'];
}


?>