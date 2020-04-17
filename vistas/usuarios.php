<?php
session_start(); //para que respete las dos secciones
if (isset($_SESSION['usuario'])) {




?>




    <!DOCTYPE html>
    <html>

    <head>
        <title>



        </title>

        <?php include_once "menu.php"; ?>
    </head>

    <body>
        <div class="container">
            <h1>Administra Usuaurios</h1>
            <div class="row">
                <div class="col-sm-4">

                    <form id="frmRegistro">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" name="nombre" id="nombre ">

                        <label>Apellidos</label>
                        <input type="text" class="form-control input-sm" name="apellidos" id="apellidos">


                        <label>usuario</label>
                        <input type="text" class="form-control input-sm" name="usuario" id="usuario">


                        <label>Password</label>
                        <input type="text" class="form-control input-sm" name="password" id="password">
                        <p></p>
                        <span class=" btn-primary btn-sm" id="registro">Registrar</span>
                       

                    </form>


                </div>

                  <div class="col-sm-6">
                      <div id="tablaUsuariosLoad"></div>
                  </div>
            </div>
        </div>
    </body>

    </html>


    <script type="text/javascript">
	$(document).ready(function(){

        $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php')
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
            //console.log(datos);
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/regLogin/registraUsuario.php",
				success:function(r){
					//alert(r);



					if(r>0){

                        $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php')
						alertify.success("Agregado con exito");
					}else{
						alertify.error("Fallo al agregar :("+r);
					}
				}
			});
		});
	});
</script>

<?php
} else {
    header("location:../index.php"); // lo devueve  al index si no esta lleno
}
?>