<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Venta;
    $infoClase = $clase->mostrarDetalles();
    $cantidad = count($infoClase);
?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Detalle de Ventas</h4>
					<ol class="breadcrumb">
                        <li>
                            <a href="index.php">Panel</a>
                        </li>
                        <li class="active">
                            Detalles de Venta
                        </li>
					</ol>
				</div>
			</div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <table id="datatable" class="table table-actions-bar table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Orden</th>
                                    <th>Ruta de Reparto</th>
                                    <th>Vehiculo</th>
                                    <th>Piloto</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($cantidad > 0){
                                    $c=0;
                                for($x = 0; $x < $cantidad; $x++){
                                    $c++;
                                    $item = $infoClase[$x];
                                ?>
                                <tr>
                                    <td><?php echo $c?></td>
                                    <td><?php echo $item['id_venta']?></td>
                                    <td><?php echo $item['codigo_ruta']?></td>
                                    <td><?php echo $item['placa_vehiculo']?></td>
                                    <td><?php echo $item['nombre_piloto']?> <?php echo $item['apellido_piloto']?></td>
                                    <td><?php echo $item['fecha_venta']?></td>
                                    <td><?php echo $item['total_venta']?></td>
                                    <td class="text-center">
                                        <a href="ver_detalle.php?id=<?php echo $item['id_venta']?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    }else{
                                ?>
                                <tr>
                                    <td>NO HAY REGISTROS</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php include 'ini/foot.php';?>