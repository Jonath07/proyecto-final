<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<?php
require 'vendor/autoload.php';
    $clase = new YocoTec\Cliente;
    $infoCliente = $clase->mostrarPorID($_GET['id']);
?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Editar Cliente</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="usuarios.php">Clientes</a></li>
						<li class="active">Editar Cliente</li>
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
                                        <input type="hidden" name="inputID" class="form-control" value="<?php echo $infoCliente['id_cliente'] ?>">
                                        <input type="text" name="inputNombre" class="form-control" value="<?php echo $infoCliente['nombre_cliente'] ?>">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Apellido cliente<span class="text-danger">*</span></label>
                                        <input type="text" name="inputApellido" class="form-control" value="<?php echo $infoCliente['apellido_cliente'] ?>">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Correo Electronico <span class="text-danger"></span></label>
                                        <input type="text" name="inputEmail" class="form-control" value="<?php echo $infoCliente['email_cliente'] ?>">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Telefono <span class="text-danger"></span></label>
                                        <input type="text" name="inputTelefono" class="form-control" value="<?php echo $infoCliente['telefono_cliente'] ?>">
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Datos</b></h5>

                                    <div class="form-group m-b-20">
                                        <label>Direccion <span class="text-danger">*</span></label>
                                        <input type="text" name="inputDireccion" class="form-control" value="<?php echo $infoCliente['direccion_cliente'] ?>">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Referencia direccion <span class="text-danger"></span></label>
                                        <textarea name="inputReferencia" class="form-control" rows="5"><?php echo $infoCliente['referencia_cliente']; ?></textarea>
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
                            <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="Actualizar">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
<?php include 'ini/foot.php';?>