<?php

require_once "../../clases/Conexion.php";
require_once "../../clases/Articulos.php";

$idart=$_POST['idarticulo'];

$obj=new articulos(); // isnatncea  ala clase articulos en donde  query de eliminar


echo $obj->eliminaArticulo($idart)  // llama el metodo  donde esta  el query

?>