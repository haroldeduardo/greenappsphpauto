<?php
session_start();// se requiere el id usuario
  $iduser=$_SESSION['iduser'];
require_once "../../clases/Conexion.php";
require_once "../../clases/Articulos.php";


$obj=new articulos();

$datos=array();



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

   if($idimagen>0){

    

    $datos[0]=$_POST['categoriaSelect'];

    $datos[1]=$idimagen;

    $datos[2]=$iduser;
    $datos[3]=$_POST['nombre'];
    $datos[4]=$_POST['descripcion'];
    $datos[5]=  $_POST['cantidad'];
    $datos[6]=    $_POST['precio'];
    echo $obj->insertaArticulo($datos);

   }else{
       echo 0;  
   }
}

//inserta las imagenes en la base de datos
