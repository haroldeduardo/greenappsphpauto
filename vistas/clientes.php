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
                        <input type="text" class="form-control input-sm" name="rfc" id="rfc">


                        <p></p>
                        <span class=" btn-primary btn-sm" id="btnAgregarCliente">Guardar</span>


                    </form>
                </div>
                <div class="col-sm-8">
                    <div id=tablaclientesLoad></div>
                </div>
            </div>
        </div>



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        


<!-- Modal -->
<div class="modal fade" id="abremodalClientesUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Cliente</h4>
      </div>
      <div class="modal-body">
      <form id="frmClientesU">
          <input type="text" hidden=""id="idcliente"class="idcliente">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" name="nombreU" id="nombreU ">

                        <label>Apellidos</label>
                        <input type="text" class="form-control input-sm" name="apellidosU" id="apellidosU">


                        <label>Direccion</label>
                        <input type="text" class="form-control input-sm" name="direccionU" id="direccionU">

                        <label>Email</label>
                        <input type="text" class="form-control input-sm" name="emailU" id="emailU">

                        <label>Telefono</label>
                        <input type="text" class="form-control input-sm" name="telefonoU" id="telefonoU">


                        <label>identificacion</label>
                        <input type="text" class="form-control input-sm" name="rfcU" id="rfcU">


                        <p></p>
                        


                    </form>
      </div>
      <div class="modal-footer">
        <button type="button"id="btnAgregarClienteU" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
       
      </div>
    </div>
  </div>
</div>
    </body>

    </html>

    <script type="text/javascript">



function agregaDatosCliente(idcliente) {


$.ajax({
    url: "../procesos/clientes/obtenDatosCliente.php", // lso adtso obetenido va  a ir actualizarUsuario.php
    type: "post",
    dataType: "html",
    data: "idcliente=" + idcliente, // se obtiene los datos del usuario por medio del post
    
    
    success: function(r) {

       // alert(r); //  nos va mostrar una cadena json
        dato = jQuery.parseJSON(r);

      
       

    }

});




}
    </script>


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
					url:"../procesos/clientes/agregaClientes.php",
					success:function(r){
                       
                      
                       
                       if (r > 0){


                        $('#frmClientes')[0].reset();
                       $("#tablaclientesLoad").load("clientes/tablaCliente.php")     
                        
                 
					//esta linea nos permite limpiar el formulario al insetar un registro
				

					
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