<?php
session_start();//para que respete las dos secciones
if(isset($_SESSION['usuario'])){




?>




<!DOCTYPE html>
<html>

<head>
    <title>
       
ventas

    </title>
    <?php  include_once "menu.php";?>

</head>

<body>

</body>

</html>

<?php
}

else{
    header("location:../index.php"); // lo devueve  al index si no esta lleno
}
?>