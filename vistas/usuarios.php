<?php
session_start(); //para que respete las dos secciones
if (isset($_SESSION['usuario'])) {
    //and$_SESSION['usuario']=='admin'

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

        <!-- Modal -->
        		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="actualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Usuario</h4>
					</div>
					<div class="modal-body">
						<form id="frmRegistroU">
							<input type="text" hidden="" id="idUsuario" name="idUsuario">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" name="nombreU" id="nombreU">
							<label>Apellido</label>
							<input type="text" class="form-control input-sm" name="apellidoU" id="apellidoU">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuarioU" id="usuarioU">

						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Actualiza Usuario</button>

					</div>
				</div>
			</div>
		</div>


    </body>

    </html>
    <script type="text/javascript">
        // para gregarle  al modal de la tabla usuarios  los datos  que se  van  actulizar
        function agregaDatosUsuario(idusuario) {


            $.ajax({
				url: "../procesos/usuarios/obtenDatosUsuario.php", // lso adtso obetenido va  a ir actualizarUsuario.php
				type: "post",
				dataType: "html",
				data: "idusuario=" + idusuario, // se obtiene los datos del usuario por medio del post
                
                
                success: function(r) {

                   // alert(r); //  nos va mostrar una cadena json
                    dato = jQuery.parseJSON(r);

                    $('#idUsuario').val(dato['id_usuario']);
						$('#nombreU').val(dato['nombre']);
						$('#apellidoU').val(dato['apellido']);
						$('#usuarioU').val(dato['email']);
                   

                }

            });




        }


        function eliminaUsuario(idusuario) {

alertify.confirm('¿Desea  eliminar  el usuario',
    function() {
        $.ajax({
            type: "POST",
            data: "idusuario=" +idusuario,
            url: "../procesos/usuarios/eliminarUsuario.php",
            success: function(r) {
                if (r == 1) {

                    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                    alertify.success("eliminado con exito")
                } else {
                    alertify.error("no se pudo eliminar")
                }
            }
        });

    },
    function() {
        alertify.error('Cancelo!')
    });

}


        
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('#btnActualizaUsuario').click(function() {

                datos = $('#frmRegistroU').serialize();
                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/usuarios/actualizarUsuario.php",
                    success: function(r) {

                        console.log(r);
                        if (r == 1) {

                            $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
							
							alertify.success("SE ACTUALIZO CON EXITOS");
						} else {
							alertify.error("NO SE ACTUALIZO");
						}

                    }
                });
            });
        })
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php')
            $('#registro').click(function() {

                vacios = validarFormVacio('frmRegistro');

                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos!!");
                    return false;
                }

                datos = $('#frmRegistro').serialize();
                //console.log(datos);
                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/regLogin/registraUsuario.php",
                    success: function(r) {
                        //alert(r);



                        if (r > 0) {
                            $('#frmARegistro')[0].reset();

                            $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php')
                            alertify.success("Agregado con exito");
                        } else {
                            alertify.error("Fallo al agregar :(" + r);
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