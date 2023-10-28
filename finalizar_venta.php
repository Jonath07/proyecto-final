<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>
<?php require 'funciones.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Pilotos;
    $infoClase = $clase->mostrarActivo();
    $cantidad = count($infoClase);

    $clase2 = new YocoTec\Vehiculo;
    $infoClase2 = $clase2->mostrarActivo();
    $cantidad2 = count($infoClase2);

    $clase3 = new YocoTec\Ruta;
    $infoClase3 = $clase3->mostrarActivo();
    $cantidad3 = count($infoClase3);
?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Venta</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="ventas.php">Ventas</a></li>
						<li class="active">Datos finales</li>
					</ol>
				</div>
			</div>

            <form action="./acc/ac_venta.php" method="post">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Datos Generales</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Piloto de la venta<span class="text-danger">*</span></label>
                                        <select class="form-control select2 selectpicker" name="inputPiloto" data-style="btn-default btn-custom">
                                            <option>Seleccionar</option>
                                            <?php
                                                if($cantidad > 0){
                                                    $c=0;
                                                for($x = 0; $x < $cantidad; $x++){
                                                    $c++;
                                                    $item = $infoClase[$x];
                                            ?>
                                            <option value="<?php echo $item['id_piloto'] ?>"><?php echo $item['nombre_piloto'] ?> <?php echo $item['apellido_piloto'] ?></option>
                                            <?php } }else { ?>
                                                Sin Pilotos
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Vehiculo Utilizada<span class="text-danger">*</span></label>
                                        <select class="form-control select2 selectpicker" name="inputVehiculo" data-style="btn-default btn-custom">
                                            <option>Seleccionar</option>
                                            <?php
                                                if($cantidad2 > 0){
                                                    $c=0;
                                                for($x = 0; $x < $cantidad2; $x++){
                                                    $c++;
                                                    $item2 = $infoClase2[$x];
                                            ?>
                                            <option value="<?php echo $item2['id_vehiculo'] ?>"><?php echo $item2['placa_vehiculo'] ?> - <?php echo $item2['marca_vehiculo'] ?></option>
                                            <?php } }else { ?>
                                                Sin Vehiculos
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Ruta <span class="text-danger">*</span></label>
                                        <select class="form-control select2 selectpicker" name="inputRuta" data-style="btn-default btn-custom">
                                            <option>Seleccionar</option>
                                            <?php
                                                if($cantidad3 > 0){
                                                    $c=0;
                                                for($x = 0; $x < $cantidad3; $x++){
                                                    $c++;
                                                    $item3 = $infoClase3[$x];
                                            ?>
                                            <option value="<?php echo $item3['id_ruta'] ?>"><?php echo $item3['codigo_ruta'] ?></option>
                                            <?php } }else { ?>
                                                Sin Rutas
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Fecha de registro <span class="text-danger"></span></label>
                                        <input type="date" name="inputFecha" class="form-control" placeholder="Ingresar direccion">
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Datos</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Usuario <span class="text-danger">*</span></label>
                                        <input type="text" name="inputUsuario" class="form-control" value="<?php echo $_SESSION['usuario_info']['usuario'] ?>" disabled>
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label>Total de liquido <span class="text-danger">*</span></label>
                                        <input type="text" name="inputTotal" class="form-control" value=" Q <?php echo calcularTotal(); ?>" disabled>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Nota <span class="text-danger"></span></label>
                                        <textarea class="form-control" name="inputNota" rows="5" placeholder="Ingresa nota"></textarea>
                                    </div>

                                </div>
                            </div>

                        </div>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center p-20">
                            <a href="ventas.php" type="button" class="btn w-sm btn-danger waves-effect waves-light">Cancelar</a>
                            <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="Guardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
<?php include 'ini/foot.php';?>