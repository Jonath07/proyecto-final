
<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Cliente;
    $infoCliente = $clase->mostrarPorID($_GET['id']);
?>
<?php
require 'vendor/autoload.php';
    $clase1 = new YocoTec\Coordenada;
    $infoClase = $clase1->mostrarPorCliente($_GET['id']);

?>

<script>
        function initMap() {
            var mapOptions = {
                center: { lat: <?php echo $infoClase['cordenada_y_cliente']; ?>, lng: <?php echo $infoClase['cordenada_x_cliente']; ?>},
                zoom: 17, 
                mapTypeId: 'satellite' 
            };

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var locations = [
                { lat: <?php echo $infoClase['cordenada_y_cliente']; ?>, lng: <?php echo $infoClase['cordenada_x_cliente']; ?>, title: '<?php echo $infoCliente['nombre_cliente']; ?>' },
                        
            ];

            for (var i = 0; i < locations.length; i++) {
                var marker = new google.maps.Marker({
                    position: { lat: locations[i].lat, lng: locations[i].lng },
                    map: map,
                    title: locations[i].title
                });
            }
        }
    </script>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Detalles Cliente</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="usuarios.php">Clientes</a></li>
						<li class="active">Ver Cliente</li>
					</ol>
				</div>
			</div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div id="contenidoImprimir">
                            <div style="text-align: center;">
                            <h1>Detalle Cliente</h1>
                                <p><b>ID:</b> <?php echo $infoCliente['id_cliente'] ?></p>
                                <p><b>Nombre:</b> <?php echo $infoCliente['nombre_cliente'] ?> <?php echo $infoCliente['apellido_cliente'] ?></p>
                                <p><b>Telefono:</b> <?php echo $infoCliente['telefono_cliente'] ?></p>
                                <p><b>Email:</b> <?php echo $infoCliente['email_cliente'] ?></p>
                                <p><b>Fecha de registro:</b> <?php echo $infoCliente['fecha_cliente'] ?></p>
                                <p><b>Direccion:</b> <?php echo $infoCliente['direccion_cliente'] ?></p>
                                <p><b>Referencia:</b> <?php echo $infoCliente['referencia_cliente'] ?></p>
                                <hr>
                                <h3>Ubicacion en Mapa</h3>
                        
                                <div id="map" style="height: 350px; width: 100%;"></div>
                                <script>
                                    google.maps.event.addDomListener(window, 'load', initMap);
                                </script>
                        
                                </div>
                        
                            </div>
                            <br>
                        <button id="btnImprimir" class="btn w-sm btn-primary">Imprimir</button>
                        <a href="clientes.php" type="button" class="btn w-sm btn-danger">Cancelar</a>

                        <script>
                            document.getElementById("btnImprimir").addEventListener("click", function() {
                                var contenidoDiv = document.getElementById("contenidoImprimir").innerHTML;
                                var ventanaImpresion = window.open('', '', '');
                                ventanaImpresion.document.write('<html><head><title>Impresión</title></head><body>');
                                ventanaImpresion.document.write(contenidoDiv);
                                ventanaImpresion.document.write('</body></html>');
                                ventanaImpresion.document.close();
                                ventanaImpresion.print();
                                ventanaImpresion.close();
                            });
                        </script>
                    </div>
                </div>
            </div>

<?php include 'ini/foot.php';?>