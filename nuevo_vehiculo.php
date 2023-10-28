<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Nuevo Vehiculo</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="vehiculos.php">Vehiculos</a></li>
						<li class="active">Nuevo Vehiculo</li>
					</ol>
				</div>
			</div>

            <form action="./acc/ac_vehiculo.php" method="post">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Datos Generales</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Placa Vehiculo<span class="text-danger">*</span></label>
                                        <input type="text" name="inputPlaca" class="form-control" placeholder="Ingresar datos">
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label>Marca Vehiculo<span class="text-danger">*</span></label>
                                        <input type="text" name="inputMarca" class="form-control" placeholder="Ingresar datos">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Datos</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Capacidad Toneladas Vehiculo<span class="text-danger">*</span></label>
                                        <input type="text" name="inputCapacidad" class="form-control" placeholder="Ingresar en toneladas">
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
                            <a href="vehiculos.php" type="button" class="btn w-sm btn-danger waves-effect waves-light">Cancelar</a>
                            <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="Guardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
<?php include 'ini/foot.php';?>