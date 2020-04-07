<!DOCTYPE html>
<html>

<head>
    <title>
        Registro de usuario


    </title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>

</head>

<body>


    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div>
                    <div class="panel panel-danger">
                        <div class="panel panel-heading">Registrar Administrador</div>
                        <div class="panel panel-body">
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
                                <span class=" btn  btn-primary btn-sm" id="registro">Registrar</span>
                                <a href="index.php" class=" btn  btn-default btn-sm">Regresar a login</a>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">

                </div>
            </div>
        </div>

</body>



</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					alert(r);

					if(r==1){
						alert("Agregado con exito");
					}else{
						alert("Fallo al agregar :(");
					}
				}
			});
		});
	});
</script>