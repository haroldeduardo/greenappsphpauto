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


		$resultado = mysqli_query($conexion, $sql);
		if (!$resultado) {
			return mysqli_error($conexion);
		} else {
			return mysqli_insert_id($conexion);
		}
	}

	//registrando el login ussuario

	public function loginUser($datos)
	{
		$c = new conectar();
		$conexion = $c->conexion();
		$password = sha1($datos[1]);


		//vamos  acrera la seccion del usuario

		$_SESSION['usuario'] = $datos[0];
		$_SESSION['iduser'] = self::traeID($datos); // averiguar self



		$sql = "SELECT * 
				from usuarios 
			where email='$datos[0]'
			and password='$password'";
		$result = mysqli_query($conexion, $sql);

		if (mysqli_num_rows($result) > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	public function traeID($datos)
	{
		$c = new conectar();
		$conexion = $c->conexion();
		$password = sha1($datos[1]);
		$sql = "SELECT id_usuario 
		from usuarios 
	where email='$datos[0]'
	and password='$password'";

		$result = mysqli_query($conexion, $sql);

		return mysqli_fetch_row($result)[0];
	}
	//este metodo o funcion es para  cuando se  este modificando//
	//el usuario aqui recoje todo los datos y lo lleva  a la tablausuarios.php//
	public function obtenDatosUsuario($idusuario)
	{



		$c = new conectar();
		$conexion = $c->conexion();
		$sql = "SELECT id_usuario,

	
					nombre,
					apellido,
					email
					from usuarios where id_usuario='$idusuario'";

		$result = mysqli_query($conexion, $sql);

		$ver = mysqli_fetch_row($result);

		$datos = array(
			'id_usuario'=> $ver[0],
			'nombre' => $ver[1],
			'apellido' => $ver[2],
			'email' => $ver[3]

		); ///array asociativo

		return $datos;
	}


	public function actualizaUsuario($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();


        $sql = "UPDATE usuarios set nombre='$datos[1]',apellido='$datos[2]',email='$datos[3]' 
        where id_usuario='$datos[0]'";

     return  mysqli_query($conexion, $sql);

    }



    public function eliminarUsuario($idusuario){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql= "DELETE from usuarios where id_usuario='$idusuario'";

        return mysqli_query($conexion,$sql);

}

}