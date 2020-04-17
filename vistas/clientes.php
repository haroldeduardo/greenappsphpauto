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
            <h1>Clientes</h1>
            <div class="row">
                <div class="col-sm-4">

                    <form id="frmClientes">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" name="nombre" id="nombre ">

                        <label>Apellidos</label>
                        <input type="text" class="form-control input-sm" name="apellidos" id="apellidos">


                        <label>Direccion</label>
                        <input type="text" class="form-control input-sm" name="direccion" id="direccion">

                        <label>Email</label>
                        <input type="text" class="form-control input-sm" name="email" id="email">

                        <label>Telefono</label>
                        <input type="text" class="form-control input-sm" name="telefono" id="telefono">


                        <label>identificacion</label>
                        <input type="text" class="form-control input-sm" name="identificacion" id="identificacion">


                        <p></p>
                        <span class=" btn-primary btn-sm" id="btnAgregarCliente">Guardar</span>


                    </form>
                </div>
                <div class="col-sm-8">
                    <div id=tablaclientesLoad></div>
                </div>
            </div>
        </div>

    </body>

    </html>


    <script type="text/javascript">
		$(document).ready(function(){

$('#tablaclientesLoad').load("clientes/tablaCliente.php");

$('#btnAgregarCliente').click(function(){

	vacios=validarFormVacio('frmClientes');

	if(vacios > 0){
		alertify.alert("Debes llenar todos los campos!!");
		return false;
	}

				datos=$('#frmClientes').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/categorias/agregaCategoria.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmClientes')[0].reset();

					$('#tablaclientesLoad').load("clientes/tablaCliente.php");
					alertify.success("Clientes agregados con exito :D");
				}else{
					alertify.error("No se pudo agregar clientes");
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