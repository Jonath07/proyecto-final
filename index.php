<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $claseUsuario = new YocoTec\Usuario;
    $cantidadUsuarios = count($claseUsuario->mostrar());

    $claseCliente = new YocoTec\Cliente;
    $cantidadClientes = count($claseCliente->mostrar());

    $claseVentas = new YocoTec\Venta;
    $cantidadVentas = count($claseVentas->mostrarDetalles());

    $claseSumatotal = new YocoTec\Venta;
    $sumaTotal =  $claseSumatotal->sumaTotal();

    $infoClase = $claseVentas->mostrarDetallesDos();
    $cantidad = count($infoClase);

    $tablero = new YocoTec\Tablero;
    $ultimoMes =  $tablero->TotalDelMes();

    $totalMes = count($tablero->DatosDelMes());

    $diaActual =  $tablero->TotalDelDia();

    $diaAnterior =  $tablero->TotalDelDiaAnterior();
    
    $mesAnterior = $tablero->mesAnterior();

    $clase2 = new YocoTec\Producto;
    $infoClase2 = $clase2->mostrarUltimosDos();
    $cantidad2 = count($infoClase2);
?>

<div class="content-page">
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Panel</h4>
                    <p class="text-muted page-title-alt">Bienvenido a YocoTec admin !</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-attach-money text-primary"></i>
                        <h2 class="m-0 text-dark counter font-600"><?php echo $sumaTotal['SumaTotal'] ?></h2>
                        <div class="text-muted m-t-5">Total Ingreso</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-add-shopping-cart text-pink"></i>
                        <h2 class="m-0 text-dark counter font-600"><?php echo $cantidadVentas ?></h2>
                        <div class="text-muted m-t-5">Total ordenes</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-store-mall-directory text-info"></i>
                        <h2 class="m-0 text-dark counter font-600"><?php echo $cantidadClientes ?></h2>
                        <div class="text-muted m-t-5">Clientes</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-account-child text-custom"></i>
                        <h2 class="m-0 text-dark counter font-600"><?php echo $cantidadUsuarios ?></h2>
                        <div class="text-muted m-t-5">Usuarios</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card-box">
                        <h4 class="text-dark header-title m-t-0 m-b-30">Total Ingresos</h4>
                        <div class="widget-chart text-center">
                            <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#fb6d9d" value="<?php echo $totalMes ?>" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
                            <h5 class="text-muted m-t-20">Total ingresos del mes</h5>
                            <h2 class="font-600">Q <?php echo $ultimoMes['SumaTotal'] ?></h2>
                            <ul class="list-inline m-t-15">
                                <li>
                                    <h5 class="text-muted m-t-20">Dia</h5>
                                    <h4 class="m-b-0">Q <?php echo $diaActual['SumaTotal'] ?></h4>
                                </li>
                                <li>
                                    <h5 class="text-muted m-t-20">Dia Anterior</h5>
                                    <h4 class="m-b-0">Q <?php echo $diaAnterior['SumaTotal'] ?></h4>
                                </li>
                                <li>
                                    <h5 class="text-muted m-t-20">Mes Pasado</h5>
                                    <h4 class="m-b-0">Q <?php echo $mesAnterior['SumaTotal'] ?></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card-box">
						<h4 class="text-dark header-title m-t-0">Analisis de ventas</h4>
						<div class="text-center">
							<ul class="list-inline chart-detail-list">
								<li>
									<h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Garrafones</h5>
								</li>
								<li>
									<h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Bolsas</h5>
								</li>
								<li>
									<h5><i class="fa fa-circle m-r-5" style="color: #dcdcdc;"></i>Otros</h5>
								</li>
							</ul>
						</div>
                        <div id="morris-bar-stacked" style="height: 303px;"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <a href="detalle_ventas.php" class="pull-right btn btn-default btn-sm waves-effect waves-light">Ver todas</a>
                        <h4 class="text-dark header-title m-t-0">Liquidacion de dia</h4>
                        <p class="text-muted m-b-30 font-13">
							Reporte de la 3 ultima venta registrada.
						</p>
                        <div class="table-responsive">
                        <table class="table table-actions-bar">
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
                <div class="col-lg-6">
                    <div class="card-box">
                        <a href="productos.php" class="pull-right btn btn-default btn-sm waves-effect waves-light">Ver todos</a>
                        <h4 class="text-dark header-title m-t-0">Productos recientes</h4>
                        <p class="text-muted m-b-30 font-13">
							Ultimos 2 producto agregados.
						</p>
                        <div class="table-responsive">
                            <table class="table table-actions-bar">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Producto</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($cantidad2 > 0){
                                    $c=0;
                                for($x = 0; $x < $cantidad2; $x++){
                                    $c++;
                                    $item = $infoClase2[$x];
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
    </div>

<?php include 'ini/foot.php';?>