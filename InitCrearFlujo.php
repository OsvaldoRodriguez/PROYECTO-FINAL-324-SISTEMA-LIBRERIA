
<?php 
include "conexion.inc.php";
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];
$usuario = $_GET['usuario'];
$fecha_actual = $_GET['fechaini'];

$sql = "insert into flujotramite values('".$flujo."', '".$proceso."', '".$nro_tramite."', '".$fecha_actual."', null, '".$usuario."', '".$usuario."');";
mysqli_query($con, $sql);
header("Location: bentrada.php");
?>
