<?php
session_start(); //para que respete las dos secciones
if (isset($_SESSION['usuario'])) {




?>




    <!DOCTYPE html>
    <html>

    <head>
        <title>

            ventas

        </title>
        <?php include_once "menu.php"; ?>

    </head>

    <body>

        <div class="containes">
            <h1>Ventas de Producto </h1>
            <div class="row">
                <div class="col-sm-12">



                    <span class="btn btn-default" id="ventaProductosBtn">Vender Producto</span>
                    <span class="btn btn-default"id="ventasHechasBtn">Ventas Hechas</span>



                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="ventaProductos"></div>
                    <div id="ventasHechas"></div>



                </div>
            </div>

        </div>


    </body>

    </html>
    <script type="text/javascript">
		$(document).ready(function(){
			$('#ventaProductosBtn').click(function(){
				esconderSeccionVenta();
				$('#ventaProductos').load('ventas/ventasDeProductos.php');
				$('#ventaProductos').show();
			});
			$('#ventasHechasBtn').click(function(){
				esconderSeccionVenta();
				$('#ventasHechas').load('ventas/ventasyReportes.php');
				$('#ventasHechas').show();
			});
		});

		function esconderSeccionVenta(){
			$('#ventaProductos').hide();
			$('#ventasHechas').hide();
		}

	</script>

<?php
} else {
    header("location:../index.php"); // lo devueve  al index si no esta lleno
}
?>