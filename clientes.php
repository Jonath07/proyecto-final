<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Cliente;
    $coordenada = new YocoTec\Coordenada;
    $infoClase = $clase->mostrar();
    $cantidad = count($infoClase);
?>


<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Clientes</h4>
					<ol class="breadcrumb">
                        <li>
                            <a href="index.php">Panel</a>
                        </li>
                        <li class="active">
                            Clientes
                        </li>
					</ol>
				</div>
			</div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="btn01 text-right">
                            <a href="nuevo_cliente.php" class="btn btn-default btn-md waves-effect waves-light m-b-15"><i class="md md-add"></i> Agregar</a>
                        </div>
                        <table id="datatable" class="table table-actions-bar table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Status</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
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
                                    <td><?php print $c?></td>
                                    <td><?php print $item['nombre_cliente']?> <?php print $item['apellido_cliente']?></td>
                                    <td><?php if($item['estado_cliente'] == 1){ ?>
                                            <span class="label label-primary">Activo</span>
                                        <?php } else{ ?>
                                            <span class="label label-danger">Suspendido</span>
                                        <?php } ?>
                                    </td>
                                    <td><?php print $item['direccion_cliente']?></td>
                                    <td><?php print $item['telefono_cliente']?></td>
                                    <td class="text-center">

                                    <?php if($item['estado_cliente'] == 1){ ?>
                                        <?php if(!$coordenada->mostrarPorCliente($item['id_cliente'])){
                                        ?>
                                        <a href="nueva_coordenada.php?id=<?php print $item['id_cliente']?>" class="table-action-btn"><i class="md md-room"></i></a>
                                        <a href="editar_cliente.php?id=<?php print $item['id_cliente']?>" class="table-action-btn"><i class="md md-edit"></i></a>
                                        <a href="acc/ac_cliente.php?sus=<?php echo $item['id_cliente']?>" class="table-action-btn"><i class="md md-close"></i></a>
                                        <?php } else{ ?>
                                            <a href="ver_cliente.php?id=<?php print $item['id_cliente']?>" class="table-action-btn"><i class="md md-location-history"></i></a>
                                            <a href="editar_cliente.php?id=<?php print $item['id_cliente']?>" class="table-action-btn"><i class="md md-edit"></i></a>
                                            <a href="acc/ac_cliente.php?sus=<?php echo $item['id_cliente']?>" class="table-action-btn"><i class="md md-close"></i></a> 
                                            <?php } ?>
                                                <?php } else{ ?>
                                                <a href="acc/ac_cliente.php?act=<?php echo $item['id_cliente']?>" class="table-action-btn"><i class="md md-done-all"></i></a>
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