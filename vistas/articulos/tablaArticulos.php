<<<<<<< HEAD
<?php
 require_once "../../clases/Conexion.php";

 $c = new conectar();
 $conexion=$c->conexion();

 $sql="SELECT art.nombre,art.descripcion,art.cantidad,art.precio 
 FROM  articulos as art";

 $result = mysqli_query($conexion,$sql);
?>
=======

	<?php 
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT art.nombre,art.descripcion,art.cantidad,art.precio
					FROM articulos as art";
			$result=mysqli_query($conexion,$sql);
	 ?>


>>>>>>> ff4d93837833f2e615d01354be19b4813068dc63





<table class="table table-hover table-condensed table-bordered" style="text-align: center";>
<caption><label>Articulos</label></caption>
    <tr>
        <td>Nombre</td>
        <td>Descripcion</td>
        <td>Cantidad</td>
        
        <td>Precio</td>
        <td>Imagen</td>
        <td>Categoria</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>

<<<<<<< HEAD
  <?php while($ver=mysqli_fetch_row($result)): ?>


    <tr>
    <td><?php echo $ver[0] ; ?></td>
    <td><?php echo $ver[1] ; ?></td>
    <td><?php echo $ver[2] ; ?></td>
    <td><?php echo $ver[3] ; ?></td>
=======
  
<?php while($ver=mysqli_fetch_row($result )): ?>

    <tr>
    <td><?php echo $ver[0];?></td>
    <td><?php echo $ver[1];?></td>
    <td><?php echo $ver[2];?></td>
    <td><?php echo $ver[3];?></td>
>>>>>>> ff4d93837833f2e615d01354be19b4813068dc63
    <td></td>
    <td></td>
    <td></td>
        <td>
           <span class="btn btn-warning btn-small">
           <span class="glyphicon glyphicon-pencil"></span>
        </span> 
        </td>
        <td>
        <span class="btn btn-danger btn-small">
        <span class="glyphicon glyphicon-remove"></span>
        </span> 
        </td>
    </tr>
<<<<<<< HEAD
  <?php endwhile; ?>
=======
<?php endwhile; ?>
>>>>>>> ff4d93837833f2e615d01354be19b4813068dc63
</table>