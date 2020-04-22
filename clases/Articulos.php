<?php
 class articulos{

    // esta funcion es para agregar la imagen en la tabla imagenes
public function agregaImagen($datos){
$c=new conectar();

$conexion=$c->conexion();


$fecha =date('Y-m-d');

$sql= "INSERT into  imagenes (id_categoria,nombre,ruta,fechaSubida)
values('$datos[0]','$datos[1]','$datos[2]','$fecha')";    


$resultado = mysqli_query($conexion, $sql);
		if (!$resultado) {
			return mysqli_error($conexion);
		} else {
			return mysqli_insert_id($conexion);
		}



//return mysqli_insert_id($conexion); //  va  a devolver el ultimo id agregado en la tb imagenes

}

public function insertaArticulo($datos)
{


    $fecha =date('Y-m-d');
    $c=new conectar();

    $conexion=$c->conexion();

    $sql="INSERT into articulos (id_categoria,
    id_imagen,
    id_usuario,
    nombre,
    descripcion,
    cantidad,
    precio,
    fechaCaptura) 
values ('$datos[0]',
'$datos[1]',
'$datos[2]',
'$datos[3]',
'$datos[4]',
'$datos[5]',
'$datos[6]',
'$fecha')";

$resultado = mysqli_query($conexion, $sql);
		if (!$resultado) {
			return mysqli_error($conexion);
		} else {
			return mysqli_insert_id($conexion);
		}
}


}
