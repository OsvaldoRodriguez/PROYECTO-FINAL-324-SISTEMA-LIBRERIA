<?php 
include "conexion.inc.php";
if(!isset($_SESSION)){ // si no ha iniciado sesion 
	session_start(); 
} 

$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];
$nro_tramite = $_GET['nro_tramite'];
$tipo = $_GET['tipo'];
$rol = $_GET['rol'];
$pantalla = $_GET['pantalla'];

// echo $_GET['id_producto']. " *****<br/>";


$estado_para_ir_adelante = 1;
$fecha_actual =  date('y-m-d h:i:s');

// para no volver atras cuando acaba un proceso
$sql = "select count(*) as cantidad from flujotramite ";
$sql .= "where flujo='".$flujo."' and ";
$sql .= "proceso='".$proceso."' and ";
$sql .= "nro_tramite='".$nro_tramite."'";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);
$cantidad = $datos["cantidad"];

// actualizar la tabla de flujotramite
if($estado_para_ir_adelante == 1){
	$sql = "update flujotramite set ";
	$sql.= " fechafin='".$fecha_actual."' ";
	$sql.= " where ";
	$sql.= " Flujo='".$flujo."' and proceso='".$proceso."' and nro_tramite='".$nro_tramite."' and fechafin is null ";
	mysqli_query($con, $sql);
}

// graba los datos de esa pantalla
include $pantalla.".grabar.inc.php";

if(isset($_GET['Siguiente'])) {
    $sql  = "select flujo, proceso, proceso_siguiente as procesoselect, tipo, rol, pantalla ";
	$sql .= "from flujo ";
	$sql .= "where flujo='".$flujo."' and ";
	$sql .= "proceso='".$proceso."'";
}

if (isset($_GET["Anterior"])) {
	$sql  = "select flujo, proceso as procesoselect, proceso_siguiente, tipo, rol, pantalla ";
	$sql .= "from flujo ";
	$sql .= "where flujo='".$flujo."' and ";
	$sql .= "proceso_siguiente='".$proceso."'";
}

if (isset($_GET["Si"]))
{
	$sql  = "select flujo, procesoSI as procesoselect ";
	$sql .= "from flujocondicion ";
	$sql .= "where flujo='".$flujo."' and ";
	$sql .= "proceso='".$proceso."'";
}
if (isset($_GET["No"]))
{
	$sql  = "select flujo, procesoNO as procesoselect ";
	$sql .= "from flujocondicion ";
	$sql .= "where flujo='".$flujo."' and ";
	$sql .= "proceso='".$proceso."'";
}

$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);
$proceso_select = $datos["procesoselect"];


$proceso = $proceso_select;
$parametros="?flujo=".$flujo;
$parametros.="&proceso=".$proceso;
$parametros.="&nro_tramite=".$nro_tramite;

// calculando para el tipo
$sql = "select * from flujo ";
$sql .= "where flujo='".$flujo."' and ";
$sql .= "proceso='".$proceso."'";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);

echo "nuevo rol **** ".$datos['rol'];

$parametros.="&tipo=".$datos['tipo'];


echo "<br/>".$parametros."**** parametros <br/>";

// adicionando nueva tarea

$usuario_a_realizar_sig_tarea;

echo "hay  que encontrar otro rol <br/>";
// hay que buscar al otro usuario en este caso kardex
$rol_tarea = $datos['rol'];
// buscando el id de $fila['rol'] en rol
$sql  = "select * from rol ";
$sql .= " where descripcion='".$rol_tarea."' ";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);

$id_rol = $datos['id'];
echo "id del nuevo rol ".$id_rol. "<br/>";


// ahora hay que buscar que usuario puede hacer esa tarea en rolusuario
$sql = "select * from rolusuario ";
$sql .= " where IdRol='".$id_rol."' ";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);

$id_usuario_tarea = $datos['IdUsuario'];
echo $id_usuario_tarea." *^*^*^*^*usuario siguiente tarea<br/>";

if($id_rol == 3){
	echo "***********************HAY QUE BUSCAR QUIEN ES DE VVERDAD <br/>";

	// hay que encontrar al usuario correcto
	$sql  = "select * from flujotramite ";
	$sql .= " where flujo='".$flujo."' and nro_tramite='".$nro_tramite."' ";
	$consulta = mysqli_query($con, $sql);
	$datos = mysqli_fetch_array($consulta);
	print_r($datos);
	// solo  cambie usuario por usuario_tarea linea 130 y 132
	echo " <BR/>*************** ALUMNO CORRECTO ".$datos['usuario_tarea']."<br/>";
	
	$usuario_usuario_cliente = $datos['usuario_tarea'];
	// buscando su id de ese alumno

	$sql  = "select * from usuario ";
	$sql .= " where descripcion='".$usuario_usuario_cliente."' ";
	$consulta = mysqli_query($con, $sql);
	$datos = mysqli_fetch_array($consulta);

	$id_correcto_usuario = $datos['id'];
	echo " *************** ID CORRECTO FINALEMENT ".$id_correcto_usuario."<br/>";
	$id_usuario_tarea = $id_correcto_usuario;
	
}



echo "Id Usuario: ".$id_usuario_tarea."<br/>";
echo "id usuario siguiente tarea ".$id_usuario_tarea. "<br/>";


$sql  = "select * from usuario ";
$sql .= " where id='".$id_usuario_tarea."' ";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);
$usuario_a_realizar_sig_tarea = $datos['descripcion'];


	// ahora ubiacmos al kardista

// ***************************************************************************************
$sql = "select * from flujotramite where flujo='".$flujo."' and nro_tramite = '".$nro_tramite."' ";
$consulta = mysqli_query($con, $sql);
$datos = mysqli_fetch_array($consulta);

$usuario_anterior = $datos['usuario_tarea'];
// ***************************************************************************************



echo "usuario a realixar al siguient tarera ".$usuario_a_realizar_sig_tarea. "<br/>";
$sql ="insert into flujotramite(flujo, proceso, nro_tramite, fechaini, fechafin, usuario, usuario_tarea) ";
$sql .= "values('".$flujo."', '".$proceso."','".$nro_tramite."', '".$fecha_actual."', NULL , '".$usuario_a_realizar_sig_tarea."' ,'".$usuario_anterior."'); ";
echo $sql;

if($tipo != 'F' and $estado_para_ir_adelante == 1 and isset($proceso)){
	mysqli_query($con, $sql);
}
echo "<br/>proeso ".$proceso." ".$tipo."  fial********* <br/>";
echo $_SESSION['rol']. " comprara roles " .$rol_tarea."<br/>";

// hay que controlar que el usuario sea el mismo or 

if ( $proceso == "" or $tipo == 'F' or ($_SESSION['rol'] != $rol_tarea)){
    // echo "hola<br/>";
    header("Location: bentrada.php");
}else{
	// aqui hay que adicionar el nuevo proceso
	header("Location: flujo.php".$parametros);	
}


?>