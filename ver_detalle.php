
<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Venta;
    $infoClase = $clase->mostrarDetallesID($_GET['id']);

    $infoProductos = $clase->mostrarProductosDetalle($_GET['id']);
    $cantidad = count($infoProductos);
?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Detalles de Venta</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="detalle_ventas.php">Detalle de Ventas</a></li>
						<li class="active">Ver Venta</li>
					</ol>
				</div>
			</div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div id="contenidoImprimir">
                            <style>
                                body{
                                    width: 100%;
                                }
                                p{
                                    margin-bottom: 1px;
                                    margin-top: 1px;
                                }
                                h3{
                                    margin-top: 1px;
                                    margin-bottom: 1px;
                                }
                                table{
                                    margin-top: 15px;
                                    width: 80%;
                                }
                                table th, td{
                                    padding: 10px;
                                }
                                .medios{
                                    width: 40%;
                                }
                                .completos{
                                    width: 100%;
                                    align-items: center;
                                    place-content: center;
                                    display: flex;
                                }
                            </style>
                        
                            <div class="completos" style="display: flex; align-items: center; place-content: center;">
                            <div class="completos" style="text-align: left;"> <h1>LIQUIDACION DE VENTA</h1> </div>
                            
                            <br>
                            </div>
                            <div class="completos" style="display: flex; align-items: center; place-content: center;">
                            <div class="medios" style="align-items: left;"> 
                            <p><strong>Piloto:</strong> <?php echo $infoClase['nombre_piloto'] ?> <?php echo $infoClase['apellido_piloto'] ?></p> 
                                <p><strong>Vehiculo:</strong> <?php echo $infoClase['marca_vehiculo'] ?> - <?php echo $infoClase['placa_vehiculo'] ?></p> 
                                <p><strong>Ruta de Vehiculo:</strong> <?php echo $infoClase['codigo_ruta'] ?></p>
                                <p><strong>Usuario registro:</strong> <?php echo $infoClase['usuario'] ?></p>
                                <p><strong>Total de la Orden: </strong>Q <?php echo $infoClase['total_venta'] ?></p>
                            </div>
                            <div class="medios" style="text-align: right;">
                                
                                <h3>No. Orden:</h3>
                                <p>#<?php echo $infoClase['id_venta'] ?></p>
                                <br>
                                <h3>Fecha de emision:</h3>
                                <p><?php echo $infoClase['fecha_venta'] ?></p>
                            </div>
                            </div>
                            <table border="1" align="center">
                                <tr>
                                    <th>No.</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                </tr>
                                <?php
                                if($cantidad > 0){
                                    $c=0;
                                for($x = 0; $x < $cantidad; $x++){
                                    $c++;
                                    $item = $infoProductos[$x];
                                ?>
                                <tr>
                                    <td><?php echo $c?></td>
                                    <td><?php echo $item['nombre_producto']?></td>
                                    <td><?php echo $item['cantidad_venta']?></td>
                                    <td><?php echo $item['precio_venta']?></td>
                                    <td><?php echo ($item['cantidad_venta']*$item['precio_venta']) ?></td>
                                </tr>
                                <?php
                                    }
                                    }else{
                                ?>
                                <tr>
                                    <td colspan="5">NO HAY REGISTROS</td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="4" align="right">Total</td>
                                    <td><strong>Q <?php echo $infoClase['total_venta'] ?></strong></td>
                                </tr>
                            </table>
                            <br>
                                <div class="completos">
                                    <div class="medios" style="align-items: left;">
                                        <h2>Nota:</h2>
                                        <p><?php echo $infoClase['nota_venta'] ?></p>
                                    </div>
                                    <div class="medios">
                                        
                                    </div>
                                </div>
                        </div>
                        <hr>
                        <button id="btnImprimir" class="btn w-sm btn-primary">Imprimir</button>
                        <a href="detalle_ventas.php" type="button" class="btn w-sm btn-danger">Cancelar</a>

                        <script>
                            document.getElementById("btnImprimir").addEventListener("click", function() {
                                var contenidoDiv = document.getElementById("contenidoImprimir").innerHTML;
                                var ventanaImpresion = window.open('', '', '');
                                ventanaImpresion.document.write('<html><head><title>Impresión</title></head><body>');
                                ventanaImpresion.document.write(contenidoDiv);
                                ventanaImpresion.document.write('</body></html>');
                                ventanaImpresion.document.close();
                                ventanaImpresion.print();
                                ventanaImpresion.close();
                            });
                        </script>
                    </div>
                </div>
            </div>

<?php include 'ini/foot.php';?>