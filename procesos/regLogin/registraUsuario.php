<?php
require_once "../../clases/Conexion.php";
require_once "../../clases/Usuarios.php";
$obj= new usuarios(); // istanciamos para utilizar lo de la funcion usuarios de la clase Usuaurios la cual hacer lo sql

$pass=sha1($_POST['password']); //encriptar el password


$datos=array(
    $_POST['nombre'],
    $_POST['apellidos'],
    $_POST['usuario'],
    $pass
            );

            print_r($datos);

//se crear una variable datso de tipo array la cual recibe los parametros del index como es el nombre appelidos etc

echo $obj->registroUsuario($datos); // mostrar la consulta

?>

<?php 

	




	
	

 ?>