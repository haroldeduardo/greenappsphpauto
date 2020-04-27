<?php
session_start(); //  nota :esto es para saber  que  usuario esta en el sistema y poder ver  que cliente
// fue  que creo  en  query

// EN ESTA CLASE ES LA CUAL VAMOS A RECIBIR LOS DATOS  DIGITADO  PARA LA CREACION DEL CLIENTE
// POR MEDIO $_POST SE RECIBE ESA INFORMACION SE CREA LA CLASE CLIENTES EN CLASE PARA HACER EL QUERY RESPECTIVO


//1---paso agregra conexion y clientes se hace  esto para ir a donde esta la conexion de la
// base de datos y el query que se  requiera  insertar elimar  editar

require_once "../../clases/Conexion.php";
require_once "../../clases/Clientes.php";

//2 paso se va recoejr los datos por  medi de print_r($_POST) y en la funcion de js colocamos
// console.log(r) y   recojemos los datos   en el navegador por medio  de la consola

print_r($_POST);

// 3 paso depues de recojer los datos  hacemos una array depues de esto se crea la clase  en
//clientes  en Clientes.php


$obj=new clientes();


$datos=array(
$_POST['nombre'],
$_POST['apellidos'],
$_POST['direccion'],
$_POST['email'],
$_POST['telefono'],
$_POST['rfc']);


echo $obj->agregaCliente($datos);

//10--- llamamos la funcion  de query insertar agregaCliente($datos) ojo que se tiene q
// instanciar la clase clientes.php


