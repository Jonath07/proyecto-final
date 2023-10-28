<?php include 'ini/config.php';?>
<?php include 'ini/top.php';?>

<div class="content-page">
	<div class="content">
		<div class="container">
            <div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Nuevo Usuarios</h4>
					<ol class="breadcrumb">
                        <li><a href="index.php">Panel</a></li>
                        <li><a href="usuarios.php">Usuarios</a></li>
						<li class="active">Nuevo Usuario</li>
					</ol>
				</div>
			</div>

            <form action="./acc/ac_usuario.php" method="post">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Datos Generales</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Nombres <span class="text-danger">*</span></label>
                                        <input type="text" name="inputNombre" class="form-control" placeholder="Ingresar nombre" require>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Apellidos <span class="text-danger">*</span></label>
                                        <input type="text" name="inputApellido" class="form-control" placeholder="Ingresar apellido" require>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Correo Electronico <span class="text-danger"></span></label>
                                        <input type="text" name="inputEmail" class="form-control" placeholder="Ingresar Email">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Direccion <span class="text-danger"></span></label>
                                        <input type="text" name="inputDireccion" class="form-control" placeholder="Ingresar direccion">
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Datos</b></h5>
                                    <div class="form-group m-b-20">
                                        <label>Nombre de Usuario <span class="text-danger">*</span></label>
                                        <input type="text" name="inputUsuario" class="form-control" placeholder="Ingresar nombre de usuario">
                                    </div>

                                    <div class="form-group m-b-20">
                                        <label>Contraseña de Usuario <span class="text-danger">*</span></label>
                                        <input type="password" name="inputPassword" class="form-control" placeholder="Ingresar contraseña">
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

                                    <div class="form-group m-b-20">
                                        <label class="m-b-15">Avatar <span class="text-danger">*</span></label>
                                        <br/>
                                        <div class="radio radio-inline radio-primary">
                                            <input type="radio" id="inlineAvatar1" value="1" name="inlineAvatar" checked="">
                                            <label for="inlineAvatar1"><img src="./assets/images/users/1.png" class="thumb-md"></label>
                                        </div>
                                        <div class="radio radio-inline radio-info">
                                            <input type="radio" id="inlineAvatar2" value="2" name="inlineAvatar">
                                            <label for="inlineAvatar2"><img src="./assets/images/users/2.png" class="thumb-md"></label>
                                        </div>
                                        <div class="radio radio-inline radio-warning">
                                            <input type="radio" id="inlineAvatar3" value="3" name="inlineAvatar">
                                            <label for="inlineAvatar3"><img src="./assets/images/users/3.png" class="thumb-md"></label>
                                        </div>
                                        <div class="radio radio-inline radio-success">
                                            <input type="radio" id="inlineAvatar4" value="4" name="inlineAvatar">
                                            <label for="inlineAvatar4"><img src="./assets/images/users/4.png" class="thumb-md"></label>
                                        </div>
                                        <div class="radio radio-inline radio-pink">
                                            <input type="radio" id="inlineAvatar5" value="5" name="inlineAvatar">
                                            <label for="inlineAvatar5"><img src="./assets/images/users/5.png" class="thumb-md"></label>
                                        </div>
                                        <div class="radio radio-inline radio-purple">
                                            <input type="radio" id="inlineAvatar6" value="6" name="inlineAvatar">
                                            <label for="inlineAvatar6"><img src="./assets/images/users/6.png" class="thumb-md"></label>
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
                            <a href="usuarios.php" type="button" class="btn w-sm btn-danger waves-effect waves-light">Cancelar</a>
                            <button type="submit" class="btn w-sm btn-default waves-effect waves-light" name="accion" value="Guardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
<?php include 'ini/foot.php';?>