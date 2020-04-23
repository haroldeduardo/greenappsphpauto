<?php
 class articulos{
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


}

?>