<?php
session_start();//para que respete las dos secciones
if(isset($_SESSION['usuario'])){




?>




<!DOCTYPE html>
<html>

<head>
    <title>
       


    </title>
    

</head>

<body>

</body>

</html>

<?php
}

else{
    header("../index.php"); // lo devueve  al index si no esta lleno
}
?>