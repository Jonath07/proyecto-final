<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Pilotos;
    $infoPiloto = $clase->mostrarPorID($_GET['id']);
?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Editar Piloto</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="pilotos.php">Pilotos</a></li>
						<li class="active">Editar Piloto</li>
					</ol>
				</div>
			</div>

            <form action="./acc/ac_piloto.php" method="post">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Datos Generales</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Nombre<span class="text-danger">*</span></label>
                                        <input type="text" name="inputNombre" class="form-control" value="<?php echo $infoPiloto['nombre_piloto'] ?>">
                                        <input type="hidden" name="inputID" class="form-control" value="<?php echo $infoPiloto['id_piloto'] ?>">
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label>Apellido<span class="text-danger">*</span></label>
                                        <input type="text" name="inputApellido" class="form-control" value="<?php echo $infoPiloto['apellido_piloto'] ?>">
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label>Telefono<span class="text-danger">*</span></label>
                                        <input type="text" name="inputTelefono" class="form-control" value="<?php echo $infoPiloto['telefono_piloto'] ?>">
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Datos</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Direccion<span class="text-danger">*</span></label>
                                        <input type="text" name="inputDireccion" class="form-control" value="<?php echo $infoPiloto['direccion_piloto'] ?>">
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label class="m-b-15">Estado <span class="text-danger">*</span></label>
                                        <br/>
                                        <div class="radio radio-inline radio-success">
                                            <input type="radio" id="inlineRadio1" value="1" name="radioEstado" checked="">
                                            <label for="inlineRadio1"> Activo </label>
                                        </div>
                                        <div class="radio radio-inline radio-danger">
                                            <input type="radio" id="inlineRadio2" value="2" name="radioEstado">
                                            <label for="inlineRadio2"> Suspendido </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center p-20">
                            <a href="pilotos.php" type="button" class="btn w-sm btn-danger waves-effect waves-light">Cancelar</a>
                            <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="Actualizar">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
<?php include 'ini/foot.php';?>