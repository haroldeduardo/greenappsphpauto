<?php

class categorias
{

    public function agregaCategoria($datos)
    {

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "INSERT into categorias(id_usuario,
										nombreCategoria,
										fechaCaptura)
        values('$datos[0]','$datos[1]','$datos[2]')";

        //$resultado = mysqli_query($conexion, $datos);

    

        return mysqli_query($conexion,$sql);

       
       /* if (!$resultado) {
            return mysqli_error($conexion);
        } else {
            return mysqli_insert_id($conexion);
        }*/
    }


    public function actualizaCategoria($datos){
        $c = new conectar();
        $conexion = $c->conexion();

        $sql="UPDATE categorias set nombreCategoria='$datos[1]' 
        where id_categoria='$datos[0]'";

echo mysqli_query($conexion,$sql); 
    }
}