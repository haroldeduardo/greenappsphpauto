<?php

require_once "../../clases/Conexion.php";
require_once "../../clases/Articulos.php";


$obj=new articulos();




$datos=array(
    $_POST['categoriaSelect'],
    $_POST['nombre'],
    $_POST['descripcion'],
    $_POST['cantidad'],
    $_POST['precio'],
   



   

);
//subir  ahivos imagenes
$nombreImg=$_FILES['imagen']['name'];
$rutaAlmacenamiento=$_FILES['imagen']['tmp_name'];
$carpeta='../../archivos/';  /// ojo hay  hay que cambiarle los permiso a la carpeta en donde se va subir laimg
$rutaFinal=$carpeta.$nombreImg;


$datosImg=array(
    $_POST['categoriaSelect'],
    $nombreImg,
    $rutaFinal

); // esto es  lo que no pide  al momento de inserta  en  query


if(move_uploaded_file($rutaAlmacenamiento,$rutaFinal)){
   echo $idimagen=$obj->agregaImagen($datosImg);
}

//inserta las imagenes en la base de datos




?>