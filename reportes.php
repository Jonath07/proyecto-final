<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Reportes</h4>
					<ol class="breadcrumb">
                        <li>
                            <a href="index.php">Panel</a>
                        </li>
                        <li class="active">
                            Reportes
                        </li>
					</ol>
				</div>
			</div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card-box">
                    <h3>Por Rango de Fecha</h3>
                    <hr>
                    <form action="acc/ac_reporte.php" method="post">
                    <div class="form-group m-b-20 col-sm-12">
                        <label>Fecha de Inico <span class="text-danger"></span></label>
                        <input type="date" name="inputFechaInicio" class="form-control" require>
                    </div>
                    <div class="form-group m-b-20 col-sm-12">
                        <label>Fecha de Fin <span class="text-danger"></span></label>
                        <input type="date" name="inputFechaFin" class="form-control" require>
                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="RangoFecha">Buscar</button>
                    </div>
                    </form>
                </div>
                </div>
            

                <div class="col-sm-6">
                    <div class="card-box">
                        <h3>Por Comparacion de Fecha</h3>
                        <hr>
                        <label>Fecha Uno: <span class="text-danger"></span></label>
                        <br>
                        <div class="form-group m-b-20 col-sm-6">
                            <label>Inicio <span class="text-danger"></span></label>
                            <input type="date" name="inputFechaInicio" class="form-control" require>
                        </div>
                        <div class="form-group m-b-20 col-sm-6">
                            <label>Fin <span class="text-danger"></span></label>
                            <input type="date" name="inputFechaInicio" class="form-control" require>
                        </div>

                        <label>Fecha Dos: <span class="text-danger"></span></label>
                        <br>
                        <div class="form-group m-b-20 col-sm-6">
                            <label>Inicio <span class="text-danger"></span></label>
                            <input type="date" name="inputFechaInicio" class="form-control" require>
                        </div>
                        <div class="form-group m-b-20 col-sm-6">
                            <label>Fin <span class="text-danger"></span></label>
                            <input type="date" name="inputFechaInicio" class="form-control" require>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="Guardar">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>


<?php include 'ini/foot.php';?>