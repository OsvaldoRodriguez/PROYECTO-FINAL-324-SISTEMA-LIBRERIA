
<?php 
include "conexion.inc.php";
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];
$usuario = $_GET['usuario'];
$fecha_actual = $_GET['fechaini'];

$sql = "delete from flujotramite where flujo ='".$flujo."' and usuario='".$usuario."'";
mysqli_query($con, $sql);
header("Location: bentrada.php");
?>
