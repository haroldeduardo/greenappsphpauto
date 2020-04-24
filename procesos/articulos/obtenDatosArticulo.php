<?php
require_once "../../clases/Conexion.php";
require_once "../../clases/Articulos.php";



// istancia  la clase  articulos
$idart=$_POST['idart'];


$obj= new articulos();



//json ecode  es el que devuelde el array asociativo  -- javascrip una cadena en json
echo json_encode($obj->obtenDatosArticulo($idart));

?>

