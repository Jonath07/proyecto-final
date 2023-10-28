<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Nueva Ruta</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="rutas.php">Rutas</a></li>
						<li class="active">Nueva Ruta</li>
					</ol>
				</div>
			</div>

            <form action="./acc/ac_ruta.php" method="post">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Datos Generales</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Codigo Ruta<span class="text-danger">*</span></label>
                                        <input type="text" name="inputCodigo" class="form-control" placeholder="Ingresar nombre">
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label>Referencia Ruta<span class="text-danger">*</span></label>
                                        <input type="text" name="inputReferencia" class="form-control" placeholder="Ingresar nombre">
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Datos</b></h5>
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
                            <a href="rutas.php" type="button" class="btn w-sm btn-danger waves-effect waves-light">Cancelar</a>
                            <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="Guardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
<?php include 'ini/foot.php';?>