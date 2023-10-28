<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Categoria;
    $infoClase = $clase->mostrarActivo();
    $cantidad = count($infoClase);

    $clase = new YocoTec\Producto;
    $infoProducto = $clase->mostrarPorID($_GET['id']);
?>


<div class="content-page">
    <div class="content">
        <div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h4 class="page-title">Nuevo Producto</h4>
								<ol class="breadcrumb">
									<li>
										<a href="index.php">Panel</a>
									</li>
                                    <li>
										<a href="productos.php">Productos</a>
									</li>
									<li class="active">
										Nuevo Producto
									</li>
								</ol>
							</div>
						</div>

                        <div class="row">
                            <div class="col-sm-12">

                                    <form action="acc/ac_producto.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>General</b></h5>

                                                    <div class="form-group m-b-20">
                                                        <label>Nombre de Producto <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="inputNombre" value="<?php echo $infoProducto['nombre_producto'] ?>">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Descripcion Producto <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="inputDescripcion" rows="5"><?php echo $infoProducto['descripcion_producto'] ?></textarea>
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Categoria <span class="text-danger">*</span></label>
                                                        <select class="form-control select2 selectpicker" name="inputCategoria" data-style="btn-default btn-custom">
                                                            <option value="<?php echo $infoProducto['id_categoria_producto'] ?>">Seleccionar</option>
                                                            <?php
                                                                if($cantidad > 0){
                                                                    $c=0;
                                                                for($x = 0; $x < $cantidad; $x++){
                                                                    $c++;
                                                                    $item = $infoClase[$x];
                                                                ?>
                                                            <option value="<?php echo $item['id_categoria'] ?>"><?php echo $item['nombre_categoria'] ?></option>
                                                            <?php } }else { ?>
                                                                Sin Categorias
                                                                <?php } ?>
                                                        </select>

                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Data</b></h5>

                                                    <div class="form-group m-b-20">
                                                        <label>Precio <span class="text-danger">*</span></label>
                                                        <input type="text" name="inputPrecio" class="form-control" min="0" step="0.01" value="<?php echo $infoProducto['precio_producto'] ?>">
                                                        <input type="hidden" name="inputID" value="<?php echo $infoProducto['id_producto'] ?>">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label class="m-b-15">Estado <span class="text-danger">*</span></label>
                                                        <br/>
                                                        <div class="radio radio-inline radio-primary">
                                                            <input type="radio" id="inlineRadio1" value="1" name="radioInline" checked="">
                                                            <label for="inlineRadio1"> Activo </label>
                                                        </div>
                                                        <div class="radio radio-inline radio-danger">
                                                            <input type="radio" id="inlineRadio2" value="2" name="radioInline">
                                                            <label for="inlineRadio2"> Agotado </label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-30"><b>Imagen de Producto</b></h5>
                                                    <div class="text-center m-t-30">
                                                        <p><span id="nombreImagen"></span></p>
                                                        <div class="fileupload btn btn-purple btn-md w-md waves-effect waves-light">
                                                            <span><i class="ion-upload m-r-5"></i>Seleccionar</span>
                                                            <input type="file" class="upload" name="foto" id="imagen" onchange="mostrarNombre()">
                                                            <input type="hidden" name="foto2" value="<?php echo $infoProducto['img_producto'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <hr />
                                                <div class="text-center p-20">
                                                    <a href="productos.php" type="button" class="btn w-sm btn-danger waves-effect waves-light">Cancelar</a>
                                                    <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="Actualizar">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div> 
                    
                </div> 

                <script>
        function mostrarNombre() {
            var inputImagen = document.getElementById('imagen');
            var nombreImagen = document.getElementById('nombreImagen');

            if (inputImagen.files.length > 0) {
                nombreImagen.textContent = inputImagen.files[0].name;
            } else {
                nombreImagen.textContent = '<?php echo $infoProducto['img_producto'] ?>';
            }
        }
    </script>


<?php include 'ini/foot.php';?>