<?php

 //11-- vamos  ala clase  conexio se istancea  y se llama  el metodo de conexion
  require_once "../../clases/Conexion.php";

  $obj= new conectar();


$conexion=$obj->conexion();

//12  hacemos el query y el result ojo el id cliente es fundamental
// para  la edicio y eliminacion  con eso lo traabjamo s  java script
$sql="SELECT id_cliente,nombre,apellido,direccion,email,telefono,rfc from clientes";


$result= mysqli_query($conexion,$sql);


?>


<div class="table-reponsive">
<table class="table table-hover table-condensed table-bordered" style="text-align: center";>
<caption><label>Clientes</label></caption>
    <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Direccion</td>
        <td>Email</td>
        <td>Telefono</td>
        <td>Identificacion</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>

  <!-- 13  se hace  un while  en donde se  va  a buscar ua fila de la consulta
   en la parte final del tr  se finaliza el while--->


  <?php while($ver=mysqli_fetch_row($result)): ?>

 <!-- 14 ....  se imprime  la filas  buscadas -->
    <tr>
        
        <td><?php echo $ver[1];?></td>
        <td><?php echo $ver[2];?></td>
        <td><?php echo $ver[3];?></td>
        <td><?php echo $ver[4];?></td>
        <td><?php echo $ver[5];?></td>
        <td><?php echo $ver[6];?></td>
        <td>
           <span class="btn btn-warning btn-small"data-toggle="modal" data-target="#abremodalClientesUpdate" onclick="agregaDatosCliente('<?php echo $ver[0]; ?>')">
           <span class="glyphicon glyphicon-pencil"></span>
        </span> 
        </td>
        <td>
        <span class="btn btn-danger btn-small">
        <span class="glyphicon glyphicon-remove"></span>
        </span> 
        </td>
    </tr>
    <?php endwhile?>
</table>
</div>