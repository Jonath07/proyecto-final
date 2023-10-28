<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>


<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Nuevo Cliente</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="usuarios.php">Clientes</a></li>
						<li class="active">Nuevo Cliente</li>
					</ol>
				</div>
			</div>

            <form action="./acc/ac_cliente.php" method="post">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Datos Generales</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Nombre cliente<span class="text-danger">*</span></label>
                                        <input type="text" name="inputNombre" class="form-control" placeholder="Ingresar nombre">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Apellido cliente<span class="text-danger">*</span></label>
                                        <input type="text" name="inputApellido" class="form-control" placeholder="Ingresar apellido">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Correo Electronico <span class="text-danger"></span></label>
                                        <input type="text" name="inputEmail" class="form-control" placeholder="Ingresar Email">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Telefono <span class="text-danger"></span></label>
                                        <input type="text" name="inputTelefono" class="form-control" placeholder="Ingresar telefono">
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Datos</b></h5>

                                    <div class="form-group m-b-20">
                                        <label>Direccion <span class="text-danger">*</span></label>
                                        <input type="text" name="inputDireccion" class="form-control" placeholder="Ingresar direccion">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Referencia direccion <span class="text-danger"></span></label>
                                        <textarea name="inputReferencia" class="form-control" rows="5" placeholder="Ingresa una referencia"></textarea>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label class="m-b-15">Estado cliente<span class="text-danger">*</span></label>
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
                            <a href="clientes.php" type="button" class="btn w-sm btn-danger waves-effect waves-light">Cancelar</a>
                            <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="Guardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
<?php include 'ini/foot.php';?>