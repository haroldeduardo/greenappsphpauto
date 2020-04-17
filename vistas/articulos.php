<?php session_start();
if (isset($_SESSION['usuario'])) {
?>


  <!DOCTYPE html>
  <html>

  <head>
    <title>
      Articulos </title>

    <?php include_once "menu.php"; ?>
  </head>

  <body>
  <div class="container">
			<h1>Articulos</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmArticulos" enctype="multipart/form-data">
						<label>Categoria</label>
						<select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
							<option value="A">Selecciona Categoria</option>
							<?php while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
						<label>Precio</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<label>Imagen</label>
						<input type="file" id="imagen" name="imagen">
						<p></p>
						<span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaArticulosLoad"></div>
				</div>
			</div>
		</div>



  </body>

  </html>
  <script type="text/javascript">
    $(document).ready(function() {

      $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
      $('#btnAgregaArticulo').click(function(){

        vacios=validarFormVacio('frmArticulos');

	if(vacios > 0){
		alertify.alert("Debes llenar todos los campos!!");
		return false;

  }
      datos=$('#frmArticulos').serialize();
            //console.log(datos);
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/articulos/agregarArticulos.php",
				success:function(r){
					alert(r);



					if(r>0){
					alertify.alert("Agregado articulos");
					}else{
						alert("Fallo al agregar  articulos:("+r);
					}
				}
			});

    });
    });
  </script>

<?php
} else {
  header("location:../index.php");
}


?>