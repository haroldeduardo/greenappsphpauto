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


	// ojo este caso   lo podriamos llamar  actualizararticulo
	public function  obtenDatosArticulo($idarticulo)
	{

		$c = new conectar();

		$conexion=$c->conexion();


		// se hace  este query para   llenar en la  modal los datos requerido para actualizar
		$sql = "SELECT id_producto,id_categoria, nombre,descripcion,cantidad,precio
		from articulos 
		where id_producto=$idarticulo";

		 $result = mysqli_query($conexion, $sql);
         
        
		 
		$ver = mysqli_fetch_row($result);

		

		// se va  ahcer un arrray asociativo en dodnde va ver una clave yun valor
		// ojo ver temario de arrray asociativos
		//la clave  es  los datos  que se tra e de la tabla de  la base de datos
		// el valor  es lo que se tare en la tabla de la pagina de los articulos por medi
		//de la variable ver

		/*creo  que  se utiliza  array asociativo por que necesito asociar los datos
		 que tra los articulos insertados para modificarlos*/

		$datos=array(
			"id_producto"=>$ver[0],
			"id_categoria"=>$ver[1],
			"nombre"=>$ver[2],
			"descripcion"=>$ver[3],
			"cantidad"=>$ver[4],
			"precio"=>$ver[5]

			
		);
		return $datos;
	}

	public function actualizaArticulo($datos){
		$c=new conectar();
		$conexion=$c->conexion();

		/*$sql="UPDATE articulos set id_categoria='$datos[1]', 
									nombre='$datos[2]',
									descripcion='$datos[3]',
									cantidad='$datos[4]',
									precio='$datos[5]'
					where id_producto='$datos[0]'";*/

					$sql = "UPDATE articulos set id_categoria='$datos[1]',nombre='$datos[2]',descripcion='$datos[3]',
					cantidad='$datos[4]',precio='$datos[5]' 
					where id_producto='$datos[0]'";

		return mysqli_query($conexion,$sql);
	}
}
