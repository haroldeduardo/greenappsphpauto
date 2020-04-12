<!DOCTYPE html>
<html>

<head>
    <title>
        LOGIN DE USUARIO


    </title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>

</head>

<body>

<br><br><br>
    <div class="container">
        <div class="rows">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">GreenAppsDemo</div>
                    <div class="panel panel-body">
                    <div align="center"> <p> <img src="img/GreenApps.jpg" width="180px" height="150px"></p></div>
                     <form id="frmLogin">
                         <label>Usuario</label>
                         <input type="text" class="form-control input-sm" name="usuario" id="usuario"> 
                         

                         <label>Password</label>
                         <input type="password" class="form-control input-sm" name="password" id="password"> 

                         <p></p>

                         <span class=" btn  btn-primary btn-sm"id="entrarSistema">enviar</span>
                         <a href="registro.php"class=" btn  btn-danger btn-sm">Registrar</a>
                     </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>

    </div>

</body>

</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>