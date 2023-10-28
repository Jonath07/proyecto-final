<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>
<?php require 'funciones.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Producto;
    $infoClase = $clase->mostrar();
    $cantidad = count($infoClase);
?>

<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];

    $producto = new YocoTec\Producto;
    $res = $producto->mostrarPorID($id);

    if(!$res)
        header('Location: ventas.php');

    if(isset($_SESSION['venta'])){
        if(array_key_exists($id,$_SESSION['venta'])){
            actProducto($id);
        }else{
            aggProducto($res,$id);
        }
    }else{
        aggProducto($res,$id);
    }
}
?>
<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Ventas</h4>
					<ol class="breadcrumb">
                        <li>
                            <a href="index.php">Panel</a>
                        </li>
                        <li class="active">
                            Ventas
                        </li>
					</ol>
				</div>
			</div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-box">
                    <table id="datatable" class="table table-actions-bar table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Producto</th>
                                    <th>Nombre</th>
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
                                    <td><?php echo $item['precio_producto']?></td>
                                    <td class="text-center"><?php if($item['estado_producto'] == 1){ ?>
                                        <a href="ventas.php?id=<?php echo $item['id_producto']?>" class="table-action-btn"><i class="md md-add-shopping-cart"></i></a>
                                        <?php } else{ ?>
                                            <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
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
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            
                <div class="col-sm-6">
                    <div class="card-box">
                        <table id="datatable" class="table table-actions-bar table-striped table-bordered">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($_SESSION['venta']) && !empty($_SESSION['venta'])){
                                $c=0;
                                foreach($_SESSION['venta'] as $indice => $value){
                                    $c++;
                                    $total = $value['precio'] * $value['cantidad'];
                            ?>
                            <tr>
                                <form action="actualizar_venta.php" method="POST">
                                    <td><?php print $c ?></td>
                                    <td><?php print $value['nombre'] ?></td>
                                    <td><?php print $value['descripcion'] ?></td>
                                    <td>Q. <?php print $value['precio'] ?></td>
                                    <td>
                                        <input type="hidden" name="id"  value="<?php print $value['id'] ?>">
                                        <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad']?>">
                                    </td>
                                    <td>Q. <?php print $total ?></td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-refresh"></i></button>
                                        <a href="eliminar_venta.php?id=<?php print $value['id'] ?>" class="btn btn-danger  btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </form>
                            </tr>
                            <?php } }else{ ?>
                            <tr>
                                <td colspan="7">NO HAY PRODUCTOS EN REGISTRO</td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <td colspan="5" class="text-right">Total</td>
                                <td>Q. <?php echo calcularTotal(); ?></td>
                                <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        <?php
                        if(isset($_SESSION['venta']) && !empty($_SESSION['venta'])){
                        ?>
                        <div class="pull-right">
                            <a href="finalizar_venta.php" class="btn btn-success">Guardar Venta</a>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
<?php include 'ini/foot.php';?>