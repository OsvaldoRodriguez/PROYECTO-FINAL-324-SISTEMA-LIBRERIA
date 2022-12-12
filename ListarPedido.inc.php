<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos pedidos</title>
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
        h1 {font-family:Century Gothic ; color: #FFFFFF;}
        select {border-radius: .5em; font-family:Century Gothic ;}
        .container { position: absolute; top: 40%; left: 40%; transform: translate(-35%, -40%); }
        .cuadro{ width: 120%; font-size: 40px; border-collapse: collapse; text-align: center; overflow: hidden; box-shadow: 0 0 20px rgba(235, 8, 8, 0.1); background-color: rgba(253, 251, 251, 0.6);}
        .imagen{ width: 300px; height: 40px; }
        .imagen2{ width: 200px; height: 100px; margin-left: 15%;}
        .imagen3{ width: 200px; height: 150x; margin-left: 38%; }
        .uno{width: 20px; height: 20px; margin-left: 50%; }
        .buscar{ width: 450px; height: 35px; font-size: 25px;}
        .anuncio{ width: 350px; height: 150px; }
        .anuncio2{ width: 450px; height: 200px; margin-top: 2%; text-align: center;}
        table { width: auto; collapse; overflow: hidden; box-shadow: 0 0 20px rgba(235, 8, 8, 0.1);}
        th, td { padding: 15px; background-color: rgba(253, 251, 251, 0.5); color: #141212; }
        th, td { text-align: center; }
        thead,.precio { background-color: rgba(253, 251, 251, 0.9); font-weight: 900;}
        .precio_total { font-weight: 900;}
    </style>
</head>
<body>
    <h1 align="center">LISTA DE PRODUCTOS SOLICITADOS</h1>
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
                    $precio_total = 0;
                    while($datos = mysqli_fetch_array($consulta)){

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

                    echo "<td colspan='5' align='center' class='precio' > Precio Total: </td>";
                    
                    echo "<td class='precio_total'>".$precio_total." Bs. </td>";

                ?>

                
            </tbody>
        </table>
    </div>
</body>
</html>