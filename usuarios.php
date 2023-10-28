<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Usuario;
    $infoClase = $clase->mostrar();
    $cantidad = count($infoClase);
?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Usuarios</h4>
					<ol class="breadcrumb">
                        <li>
                            <a href="index.php">Panel</a>
                        </li>
                        <li class="active">
                            Usuarios
                        </li>
					</ol>
				</div>
			</div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="btn01 text-right">
                            <a href="nuevo_usuario.php" class="btn btn-default btn-md waves-effect waves-light m-b-15"><i class="md md-add"></i> Agregar</a>
                        </div>
                        <table id="datatable" class="table table-actions-bar table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Avatar</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Estado</th>
                                    <th>Direccion</th>
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
                                    <td><img src="assets/images/users/<?php echo $item['img_usuario']?>.png" alt="" width="40px" height="40px"></td>
                                    <td><?php echo $item['nombre_usuario']?></td>
                                    <td><?php echo $item['apellido_usuario']?></td>
                                    <td><?php if($item['estado_usuario'] == 1){ ?>
                                            <span class="label label-primary">Activo</span>
                                        <?php } else{ ?>
                                            <span class="label label-danger">Suspendido</span>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $item['direccion_usuario']?></td>
                                    <td class="text-center">
                                            <?php if($item['estado_usuario'] == 1){ ?>
                                                <a href="acc/ac_usuario.php?sus=<?php echo $item['id_usuario']?>" class="table-action-btn"><i class="md md-delete"></i></a>
                                            <?php } else{ ?>
                                                <a href="acc/ac_usuario.php?act=<?php echo $item['id_usuario']?>" class="table-action-btn"><i class="md md-done-all"></i></a>
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