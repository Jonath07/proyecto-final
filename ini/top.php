<?php

session_start();

if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info'])){
header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $template['description'] ?>">
        <meta name="author" content="<?php echo $template['author'] ?>">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title><?php echo $template['title'] ?></title>

        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key="></script>
        
        
    </head>

    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Yoc<i class="md md-album"></i>Tec</span></a>
                    </div>
                </div>
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="./assets/images/users/<?php echo $_SESSION['usuario_info']['img_usuario'] ?>.png" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="editar_usuario.php?id=<?php echo $_SESSION['usuario_info']['id_usuario'] ?>"><i class="ti-user m-r-5"></i> Perfil</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Configuracion</a></li>
                                        <li><a href="acc/ac_salir.php"><i class="ti-power-off m-r-5"></i> Salir</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"> <?php echo $_SESSION['usuario_info']['nombre_usuario'] ?> <?php echo $_SESSION['usuario_info']['apellido_usuario'] ?> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>
                            <li class="text-muted menu-title">Menu</li>
                            <?php if ($primary_nav) { ?>
                            
                            <?php foreach ($primary_nav as $key => $link) {
                            $active = (isset($link['url']) && ($template['active_page'] == $link['url'])) ? ' class="active"' : '';
                            ?>
                            
                            <li class="">
                                <a href="<?php echo $link['url']; ?>" <?php echo $active ?>><i class="<span> <?php echo $link['icon']; ?>"></i> <span> <?php echo $link['name']; ?> </span> </a>
                            </li>

                            <?php } }?>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

