<?php 


$sql = "select * from libreria.registrar_pedido ";
$sql.= "where id_pedido='".$nro_tramite."' ";
// echo $sql;
$consulta = mysqli_query($con, $sql);

while($datos = mysqli_fetch_array($consulta)) {
    // print_r($datos);
    $cantidad_que_pidio = $datos['cantidad'];
    $sql = "select * from libreria.productos ";
    $sql.= "where id_producto='".$datos['id_prod_prov']."'";
    $consulta_parcial = mysqli_query($con, $sql);
    $datos_parcial = mysqli_fetch_array($consulta_parcial);
    $nombre_producto = $datos_parcial['nombre'];
    $id_producto_actualizar = $datos_parcial['id_producto'];
    $cantidad_producto_actualizar = $datos_parcial['cantidad'];
    echo $cantidad_que_pidio." ** <br/>";
    echo $id_producto_actualizar." ^^^^^^ ".$cantidad_producto_actualizar."<br/>";
    
    // ahora debemos verificar si el proveedor tiene esos productos
    $sql2 = "select * from libreria.productos_proveedor ";
    $sql2.= "where nombre='".$nombre_producto."' and id_proveedor='".$datos['id_proveedor']."'";
    $consulta_parcial_proveedor = mysqli_query($con, $sql2);
    $datos_parcial_proveedor = mysqli_fetch_array($consulta_parcial_proveedor);
    $id_producto_proveedor_actualizar = -1;
    
    $cantidad_almacen = 0;
    if(isset($datos_parcial_proveedor['cantidad'])) { // si existe el producto
        $cantidad_almacen = $datos_parcial_proveedor['cantidad'];
        $id_producto_proveedor_actualizar = $datos_parcial_proveedor['id_prod_prov'];
    }
    
    echo $id_producto_proveedor_actualizar." ".$cantidad_almacen."<br/>";
    if($id_producto_proveedor_actualizar != -1){ // hay  que actualizar
        // actualizar en la libreria
        $producto_cantidad_final = (int)$cantidad_que_pidio + (int)$cantidad_producto_actualizar;
        echo "********** ".$producto_cantidad_final. "<br/>";
        
        $producto_cantidad_proveedor_final = (int)$cantidad_almacen - (int)$cantidad_que_pidio;
        echo "********** ".$producto_cantidad_proveedor_final. "<br/>";
        
        // ahora si a actualizar

        $sql = "update libreria.productos set cantidad=$producto_cantidad_final ";
        $sql .= "where id_producto=".$id_producto_actualizar." ";

        echo $sql."<br/>";
        mysqli_query($con, $sql);

        
        $sql = "update libreria.productos_proveedor set cantidad=$producto_cantidad_proveedor_final ";
        $sql .= "where id_prod_prov=".$id_producto_proveedor_actualizar." ";

        echo $sql."<br/>";
        mysqli_query($con, $sql);
    }
    echo "|".$datos['id_prod_prov']."|".$datos['id_proveedor']."|       |".$datos['cantidad']." <br/>";
}


?>