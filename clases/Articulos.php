<?php
class articulos
{
	public function agregaImagen($datos)
	{
		$c = new conectar();

		$conexion = $c->conexion();


		$fecha = date('Y-m-d');


		//se inserta las imagenes tabla imagenes
		$sql = "INSERT into  imagenes (id_categoria,nombre,ruta,fechaSubida)
values('$datos[0]','$datos[1]','$datos[2]','$fecha')";


		$resultado = mysqli_query($conexion, $sql);
		if (!$resultado) {
			return mysqli_error($conexion);
		} else {
			return mysqli_insert_id($conexion);
		}



		//return mysqli_insert_id($conexion); //  va  a devolver el ultimo id agregado en la tb imagenes

	}

	//metodo para agregar  articulos

	public function  insertaArticulo($datos)
	{

		$c = new conectar();

		$conexion = $c->conexion();


		$fecha = date('Y-m-d');

		$sql = "INSERT  into articulos (id_categoria,id_imagen,id_usuario,nombre,
descripcion,cantidad,precio,fechaCaptura)
values('$datos[0]',
'$datos[1]',
'$datos[2]',
'$datos[3]',
'$datos[4]',
'$datos[5]',
'$datos[6]',
'$fecha')";

		return mysqli_query($conexion, $sql);
	}
}
