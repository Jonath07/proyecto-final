<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Vehiculo;
    $infoClase = $clase->mostrar();
    $cantidad = count($infoClase);
?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Vehiculos</h4>
					<ol class="breadcrumb">
                        <li>
                            <a href="index.php">Panel</a>
                        </li>
                        <li class="active">
                            Vehiculos
                        </li>
					</ol>
				</div>
			</div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="btn01 text-right">
                            <a href="nuevo_vehiculo.php" class="btn btn-default btn-md waves-effect waves-light m-b-15"><i class="md md-add"></i> Agregar</a>
                        </div>
                        <table id="datatable" class="table table-actions-bar table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Placa</th>
                                    <th>Modelo</th>
                                    <th>Capacidad</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
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
                                    <td><?php echo $item['placa_vehiculo']?></td>
                                    <td><?php echo $item['marca_vehiculo']?></td>
                                    <td><?php echo $item['capacidad_vehiculo']?> TON</td>
                                    <td><?php echo $item['usuario']?></td>
                                    <td><?php echo $item['fecha_vehiculo']?></td>
                                    <td><?php if($item['estado_vehiculo'] == 1){ ?>
                                            <span class="label label-primary">Activa</span>
                                        <?php } else{ ?>
                                            <span class="label label-danger">Suspendida</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                            <?php if($item['estado_vehiculo'] == 1){ ?>
                                                <a href="editar_vehiculo.php?id=<?php echo $item['id_vehiculo']?>" class="table-action-btn"><i class="md md-edit"></i></a>
                                                <a href="acc/ac_vehiculo.php?sus=<?php echo $item['id_vehiculo']?>" class="table-action-btn"><i class="md md-delete"></i></a>
                                            <?php } else{ ?>
                                                <a href="acc/ac_vehiculo.php?act=<?php echo $item['id_vehiculo']?>" class="table-action-btn"><i class="md md-done-all"></i></a>
                                            <?php } ?>
                                        
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