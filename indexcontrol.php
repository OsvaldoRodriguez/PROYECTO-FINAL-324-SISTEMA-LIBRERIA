<?php
include "conexion.inc.php";
$usuario=$_GET["usuario"];
$contrasenia= sha1($_GET["contrasenia"]);

$sql="SELECT * FROM usuario ";
$sql.="where descripcion='".$usuario."'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

$idusuario = $fila['id'];

// echo $fila['descripcion'];

if($fila["pass"] == $contrasenia){
	
	if(!isset($_SESSION)) // si no ha iniciado sesion 
    { 
        session_start(); 
    } 
	
	// buscando el  idRol del usuario
	$sql="SELECT * FROM rolusuario ";
	$sql.="where IdUsuario='".$idusuario."'";
	$resultado = mysqli_query($con, $sql);
	$fila = mysqli_fetch_array($resultado);

	$IdRol = $fila['IdRol'];

	// con el idrol se encuentra que tipo de usuario es
	$sql="SELECT * FROM rol ";
	$sql.="where id='".$IdRol."'";
	$resultado=mysqli_query($con, $sql);
	$fila = mysqli_fetch_array($resultado);

	$_SESSION["usuario"]=$usuario;
	$_SESSION["rol"]= $fila['descripcion'];

	echo $_SESSION['usuario']. " ".$_SESSION['rol']. "<br/>";
	header("Location: bentrada.php");
}else{
	header("Location: index.php");
}

?>