<?php

// en  rl cliente php  hay un jqueri con el idcliente en donde  se puede aqui se hace el llamado

 require_once"../../clases/Conexion.php";
 require_once"../../clases/Clientes.php";


 $obj=new clientes();

 

 echo json_encode($obj->obtenDatosCliente( $_POST['idcliente']));

?>