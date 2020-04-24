<?php
//print_r($_POST);   // esto se utiliza de la mo de  console.log(r); para mirar datos en la consola
 // del navegador

require_once "../../clases/Articulos.php";

require_once "../../clases/Conexion.php";

$obj= new articulos();



     $datos=array(

     $_POST ['idArticulo'],
     $_POST ['categoriaSelectU'],
     $_POST['nombreU'],
     $_POST['descripcionU'],
     $_POST['cantidadU'] ,
     $_POST['precioU'] 


                   
     );

     echo $obj->actualizaArticulo($datos);
