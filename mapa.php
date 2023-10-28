<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Coordenada;
    $infoClase = $clase->mostrarDetalaldo();
    $cantidad = count($infoClase);
?>

<script>
    function initMap() {
        var mapOptions = {
            center: { lat: 14.991209, lng: -89.717088 },
            zoom: 17,
            mapTypeId: 'satellite'
        };

        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var locations = [
            <?php
            if ($cantidad > 0) {
                $c = 0;
                for ($x = 0; $x < $cantidad; $x++) {
                    $c++;
                    $item = $infoClase[$x];
                    ?>
                    { lat: <?php echo $item['cordenada_y_cliente']; ?>, lng: <?php echo $item['cordenada_x_cliente']; ?>, title: '<?php echo $item['nombre_cliente']; ?> <?php echo $item['apellido_cliente']; ?>' },
                    <?php
                };
            } ?>
        ];

        for (var i = 0; i < locations.length; i++) {
            var marker = new google.maps.Marker({
                position: { lat: locations[i].lat, lng: locations[i].lng },
                map: map
            });

            // Agregar información de ventana cuando se pasa el mouse sobre el marcador
            var infowindow = new google.maps.InfoWindow();

            google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i].title);
                    infowindow.open(map, marker);
                };
            })(marker, i));
        }
    }
</script>


<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Mapa</h4>
					<ol class="breadcrumb">
                        <li>
                            <a href="index.php">Panel</a>
                        </li>
                        <li class="active">
                            Mapa
                        </li>
					</ol>
				</div>
			</div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

                        <div id="map" style="height: 75vh; width: 100%;"></div>
                        <script>
                            google.maps.event.addDomListener(window, 'load', initMap);
                        </script>

                    </div>
                </div>
            </div>

        </div>
    </div>
<?php include 'ini/foot.php';?>