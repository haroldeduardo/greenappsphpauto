<?php 
	session_start(); //para que respete las dos secciones
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Usuarios.php";

	$obj= new usuarios();

	$datos=array(
		$_POST['usuario'],
	$_POST['password']
	);

	

	echo $obj->loginUser($datos);

 ?>