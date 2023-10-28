<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Producto;
    $infoClase = $clase->mostrar();
    $cantidad = count($infoClase);
?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Productos</h4>
					<ol class="breadcrumb">
                        <li>
                            <a href="index.php">Panel</a>
                        </li>
                        <li class="active">
                            Productos
                        </li>
					</ol>
				</div>
			</div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="btn01 text-right">
                            <a href="nuevo_producto.php" class="btn btn-default btn-md waves-effect waves-light m-b-15"><i class="md md-add"></i> Agregar</a>
                        </div>
                        <table id="datatable" class="table table-actions-bar table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Producto</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th>Precio</th>
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
                                    <td>
                                        <?php if($item['img_producto'] == NULL){ ?>
                                        <img src="assets/images/products/pdt00.jpg" alt="" width="40px" height="40px">
                                        <?php } else{ ?>
                                        <img src="assets/images/products/<?php echo $item['img_producto']?>" alt="" width="40px" height="40px">
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $item['nombre_producto']?></td>
                                    <td><?php echo $item['descripcion_producto']?></td>
                                    <td><?php echo $item['id_categoria_producto']?></td>
                                    <td><?php if($item['estado_producto'] == 1){ ?>
                                            <span class="label label-primary">Activo</span>
                                        <?php } else{ ?>
                                            <span class="label label-danger">Suspendido</span>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $item['precio_producto']?></td>
                                    <td class="text-center"><?php if($item['estado_producto'] == 1){ ?>
                                        <a href="editar_producto.php?id=<?php echo $item['id_producto']?>" class="table-action-btn"><i class="md md-edit"></i></a>
                                        <a href="acc/ac_producto.php?sus=<?php echo $item['id_producto']?>" class="table-action-btn"><i class="md md-close"></i></a>
                                        <?php } else{ ?>
                                            <a href="acc/ac_producto.php?act=<?php echo $item['id_producto']?>" class="table-action-btn"><i class="md md-done-all"></i></a>
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