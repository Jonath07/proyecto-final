<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>
<?php include 'ini/mapsApi.php';?>

<?php

$id = $_GET['id'];

require 'vendor/autoload.php';
    $clase = new YocoTec\Cliente;
    $infoClase = $clase->mostrarPorID($id);
?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Coordenadas</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="usuarios.php">Clientes</a></li>
						<li class="active">Nuevo Coordenada</li>
					</ol>
				</div>
			</div>

                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Datos del Cliente</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Nombre del Cliente<span class="text-danger">*</span></label>
                                        <input type="text" name="inputNombre" value="<?php echo $infoClase['nombre_cliente'] ?> <?php echo $infoClase['apellido_cliente'] ?>" class="form-control" disabled>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Direccion<span class="text-danger">*</span></label>
                                        <input type="text" name="inputApellido" class="form-control" value="<?php echo $infoClase['direccion_cliente'] ?>" disabled>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Referencia de direccion <span class="text-danger"></span></label>
                                        <input type="text" name="inputEmail" class="form-control" value="<?php echo $infoClase['referencia_cliente'] ?>" disabled>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Telefono <span class="text-danger"></span></label>
                                        <input type="text" name="inputEmail" class="form-control" value="<?php echo $infoClase['telefono_cliente'] ?>" disabled>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Email <span class="text-danger"></span></label>
                                        <input type="text" name="inputEmail" class="form-control" value="<?php echo $infoClase['email_cliente'] ?>" disabled>
                                    </div>

                                </div>
                            </div>
                    <form action="/acc/ac_cliente.php" method="post">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Datos</b></h5>
                                    <input type="hidden" name="inputID" class="form-control" value="<?php echo $infoClase['id_cliente'] ?>">

                                    <div class="form-group m-b-20 col-lg-6">
                                        <label>Latitud <span class="text-danger">*</span></label>
                                        <input type="text" name="inputCoo1" class="form-control" id="latitude" placeholder="Ingresar direccion">
                                    </div>

                                    <div class="form-group m-b-20 col-lg-6">
                                        <label>Longitud <span class="text-danger">*</span></label>
                                        <input type="text" name="inputCoo2" class="form-control" id="longitude" placeholder="Ingresar direccion">
                                    </div>

                                    <div class="form-group m-b-20">

                                        <div id="map" style="height: 35vh; width: 100%;"></div>
                                        <script>
                                            google.maps.event.addDomListener(window, 'load', initMap);
                                        </script>

                                    </div>
                                    <button id="center-map-button" type="button" class="btn w-sm btn-primary"><i class="md md-my-location"></i>Mi ubicación</button>

                                </div>
                            </div>

                        </div>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center p-20">
                            <a href="clientes.php" type="button" class="btn w-sm btn-danger waves-effect waves-light">Cancelar</a>
                            <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="coordenadas" value="asignar">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
<?php include 'ini/foot.php';?>