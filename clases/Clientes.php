<?php


  class clientes{
      // 5 paso vamos  a crear el metodo de inserta usuarios la cual recibe $datos

      public function agregaCliente($datos)


      {
          //6 se istancia la clase conectar y se llama el metodo de conexion

          $c= new conectar();
        $conexion=$c->conexion();

        //7 creacion dl query


        $idusuario=$_SESSION['iduser'];  // asi se  sabe  que  vendedor ingreso   el cliente
        $sql= "INSERT into clientes (id_usuario,
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
         $resultado= mysqli_query($conexion,$sql);

         if (!$resultado) {
            return mysqli_error($conexion);
        } else {
            return mysqli_insert_id($conexion);
        }


        //9 se va  llamar  la funcion en  agragrClientes.php

      }
  }
?>
