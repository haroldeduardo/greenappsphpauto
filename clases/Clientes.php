<?php


class clientes
{
  // 5 paso vamos  a crear el metodo de inserta usuarios la cual recibe $datos

  public function agregaCliente($datos)


  {
    //6 se istancia la clase conectar y se llama el metodo de conexion

    $c = new conectar();
    $conexion = $c->conexion();

    //7 creacion dl query


    $idusuario = $_SESSION['iduser'];  // asi se  sabe  que  vendedor ingreso   el cliente
    $sql = "INSERT into clientes (id_usuario,
        nombre,
        apellido,
        direccion,
        email,
        telefono,
        rfc)	



        values ('$idusuario',
									'$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]')";
    //8 se hace un return de la consulta y la conexion
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
      return mysqli_error($conexion);
    } else {
      return mysqli_insert_id($conexion);
    }


    //9 se va  llamar  la funcion en  agragrClientes.php

  }

  public function obtenDatosCliente($idcliente)
  {

    $c = new conectar();
    $conexion = $c->conexion();
    $sql = "SELECT id_cliente,nombre,apellido,direccion,email,telefono,rfc from clientes";
    $result = mysqli_query($conexion, $sql);
    $ver = mysqli_fetch_row($result);

    $datos = array(
      'id_cliente' => $ver[0],
      'nombre' => $ver[1],
      'apellido' => $ver[2],
      'direccion' => $ver[3],
      'email' => $ver[4],
      'telefono' => $ver[5],
      'rfc' => $ver[6]
    );
    return $datos;
  }


  public function actualizaCliente($datos){
    $c= new conectar();
    $conexion=$c->conexion();
    $sql="UPDATE clientes set nombre='$datos[1]',
                  apellido='$datos[2]',
                  direccion='$datos[3]',
                  email='$datos[4]',
                  telefono='$datos[5]',
                  rfc='$datos[6]' 
              where id_cliente='$datos[0]'";
    return mysqli_query($conexion,$sql);
  }
}
