<?php

class usuarios
{


	//insertar  el suario administrador
	public function registroUsuario($datos)
	{
		$c = new conectar();  //istancia de la conexion
		$conexion = $c->conexion();

		$fecha = date('Y-m-d');

		$sql = "INSERT into usuarios (nombre,
								apellido,
								email,
								password,
								fechaCaptura)
						values ('$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$fecha')";


	 $resultado= mysqli_query($conexion,$sql);
		if(!$resultado){
	     return mysqli_error($conexion);
		}
		else{
			return mysqli_insert_id($conexion);
		}
	}

	//registrando el login ussuario

	public function loginUser($datos){
		$c=new conectar();
		$conexion=$c->conexion();
		$password=sha1($datos[1]);

		

		$sql="SELECT * 
				from usuarios 
			where email='$datos[0]'
			and password='$password'";
		$result=mysqli_query($conexion,$sql);

		if(mysqli_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}
	}
}
