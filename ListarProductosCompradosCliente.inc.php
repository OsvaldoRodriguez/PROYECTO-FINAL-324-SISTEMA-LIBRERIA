<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html, body{
            background-color: #032E2C;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Cdefs%3E%3CradialGradient id='a' cx='396' cy='281' r='514' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%2300FDFF'/%3E%3Cstop offset='1' stop-color='%23032E2C'/%3E%3C/radialGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='400' y1='148' x2='400' y2='333'%3E%3Cstop offset='0' stop-color='%2303FFFB' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%2303FFFB' stop-opacity='0.5'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' width='800' height='400'/%3E%3Cg fill-opacity='0.5'%3E%3Ccircle fill='url(%23b)' cx='267.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='532.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='400' cy='30' r='300'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
            /* eso es el anterior body */
            margin: 0; 
            font-family: Century Gothic; 
            font-weight: 100;
            height: 10%;
        }
        h1,h3,h2 {font-family:Century Gothic ; color: #FFFFFF;}
        /* html, body { height: 10%;} */
        /* h1{ font-family:Bodoni MT Black ;} */
        /* body { margin: 0; font-family: sans-serif; font-weight: 100; background-color: #A7EEE6; background-color: #ADD6FF; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg fill-opacity='0.12'%3E%3Cpath fill='%23b6defd' d='M486 705.8c-109.3-21.8-223.4-32.2-335.3-19.4C99.5 692.1 49 703 0 719.8V800h843.8c-115.9-33.2-230.8-68.1-347.6-92.2C492.8 707.1 489.4 706.5 486 705.8z'/%3E%3Cpath fill='%23bfe6fc' d='M1600 0H0v719.8c49-16.8 99.5-27.8 150.7-33.5c111.9-12.7 226-2.4 335.3 19.4c3.4 0.7 6.8 1.4 10.2 2c116.8 24 231.7 59 347.6 92.2H1600V0z'/%3E%3Cpath fill='%23c7edfa' d='M478.4 581c3.2 0.8 6.4 1.7 9.5 2.5c196.2 52.5 388.7 133.5 593.5 176.6c174.2 36.6 349.5 29.2 518.6-10.2V0H0v574.9c52.3-17.6 106.5-27.7 161.1-30.9C268.4 537.4 375.7 554.2 478.4 581z'/%3E%3Cpath fill='%23cff4f9' d='M0 0v429.4c55.6-18.4 113.5-27.3 171.4-27.7c102.8-0.8 203.2 22.7 299.3 54.5c3 1 5.9 2 8.9 3c183.6 62 365.7 146.1 562.4 192.1c186.7 43.7 376.3 34.4 557.9-12.6V0H0z'/%3E%3Cpath fill='%23D7FBF7' d='M181.8 259.4c98.2 6 191.9 35.2 281.3 72.1c2.8 1.1 5.5 2.3 8.3 3.4c171 71.6 342.7 158.5 531.3 207.7c198.8 51.8 403.4 40.8 597.3-14.8V0H0v283.2C59 263.6 120.6 255.7 181.8 259.4z'/%3E%3Cpath fill='%23e0faf1' d='M1600 0H0v136.3c62.3-20.9 127.7-27.5 192.2-19.2c93.6 12.1 180.5 47.7 263.3 89.6c2.6 1.3 5.1 2.6 7.7 3.9c158.4 81.1 319.7 170.9 500.3 223.2c210.5 61 430.8 49 636.6-16.6V0z'/%3E%3Cpath fill='%23e8f9ec' d='M454.9 86.3C600.7 177 751.6 269.3 924.1 325c208.6 67.4 431.3 60.8 637.9-5.3c12.8-4.1 25.4-8.4 38.1-12.9V0H288.1c56 21.3 108.7 50.6 159.7 82C450.2 83.4 452.5 84.9 454.9 86.3z'/%3E%3Cpath fill='%23f0f8e6' d='M1600 0H498c118.1 85.8 243.5 164.5 386.8 216.2c191.8 69.2 400 74.7 595 21.1c40.8-11.2 81.1-25.2 120.3-41.7V0z'/%3E%3Cpath fill='%23f8f7e0' d='M1397.5 154.8c47.2-10.6 93.6-25.3 138.6-43.8c21.7-8.9 43-18.8 63.9-29.5V0H643.4c62.9 41.7 129.7 78.2 202.1 107.4C1020.4 178.1 1214.2 196.1 1397.5 154.8z'/%3E%3Cpath fill='%23FFF6DA' d='M1315.3 72.4c75.3-12.6 148.9-37.1 216.8-72.4h-723C966.8 71 1144.7 101 1315.3 72.4z'/%3E%3C/g%3E%3C/svg%3E"); background-attachment: fixed; background-size: cover; } */
        .container { position: absolute; top: 40%; left: 40%; transform: translate(-50%, -50%); }
        .cuadro{ width: 120%; font-size: 40px; border-collapse: collapse; text-align: center; overflow: hidden; box-shadow:  0 0 20px rgba(235, 8, 8, 0.1); background-color: rgba(253, 251, 251, 0.6);}
        .imagen{ width: 300px; height: 40px; }
        .imagen2{ width: 200px; height: 100px; margin-left: 15%;}
        .imagen3{ width: 200px; height: 150x; margin-left: 38%; }
        .uno{width: 20px; height: 20px; margin-left: 50%; }
        .buscar{ width: 450px; height: 35px; font-size: 25px;}
        .anuncio{ width: 350px; height: 150px; }
        .anuncio2{ width: 450px; height: 200px; margin-top: 2%; text-align: center;}
        table { width: 130%; overflow: hidden; box-shadow: 0 0 20px rgba(235, 8, 8, 0.1); text-align: left; }
        th, td { padding: 15px; background-color: rgba(253, 251, 251, 0.5); color: #141212; }
        th, td { text-align: center; }
        thead,.precio { background-color: rgba(253, 251, 251, 0.9); font-weight: 900;}
        .precio_total { font-weight: 900;}
    </style>
</head>
<body>
    <h1 align="center">PRODUCTOS COMPRADOS POR: <?php echo $usuario_quien_compro ?> </h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Id Producto</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Precio unitario</th>
                    <th>Precio total</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 

                    $sql_compra = "insert into libreria.ventas (id_pedido) values ('".$nro_tramite."') ";
                    mysqli_query($con, $sql_compra);
                    $id_cliente_vende;

                    $precio_total = 0;
                    while($datos = mysqli_fetch_array($consulta)){
                        $id_cliente_vende = $datos['id_cliente'];
                        // hay que saber el nombre
                        $sql_p = "select * from libreria.productos ";
                        $sql_p.= "where id_producto=".$datos['id_producto'];
                        $consulta_p = mysqli_query($con, $sql_p);
                        $datos_p = mysqli_fetch_array($consulta_p);
                        // print_r($datos_p);
                        echo "<tr>"; 
                        echo "<td>".$datos['id_producto']."</td>";
                        echo "<td>".$datos_p['nombre']."</td>";
                        echo "<td>".$datos['cantidad']."</td>";
                        echo "<td>".$datos['fecha']."</td>";
                        echo "<td>".$datos['precio_unitario']." Bs.</td>";
                        
                        echo "<td>".$datos['precio_unitario'] * $datos['cantidad']." Bs. </td>";
                        echo "</tr>";
                        $precio_total += $datos['precio_unitario'] * $datos['cantidad'];
                    }

                    echo "<td class='precio' colspan='5' align='center'> Precio Total: </td>";
                    
                    echo "<td class='precio_total'> ".$precio_total." Bs. </td>";
                    $fecha_actual_compra =  date('y-m-d h:i:s');
                    $sql_compra = "update libreria.ventas set id_cliente='".$id_cliente_vende."' , precio_venta='".$precio_total."', fecha='".$fecha_actual_compra."' where id_pedido= '".$nro_tramite."' "; 
                    mysqli_query($con, $sql_compra);

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>