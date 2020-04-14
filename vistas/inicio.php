<?php session_start();
if(isset($_SESSION['usuario'])){
?>


<!DOCTYPE html>
   <html>

  <head>
    <title>
        inicio  </title>

    <?php include_once "menu.php"; ?>
    </head>

  <body>

  </body>

   </html>

   <?php
}else{
  header("location:../index.php"); // lo devueve  al index si no esta lleno
}


?>