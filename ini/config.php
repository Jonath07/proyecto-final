<?php
$template = array(
    'description' => 'Sistema de Ventas',
    'author'      => 'Jonathan Cordon',
    'title'       => 'YocoTec',
    'active_page' => basename($_SERVER['PHP_SELF'])
);

$primary_nav = array(
    array(
        'name'  => 'Inicio',
        'url'   => 'index.php',
        'icon'  => 'ti-home'
    ),
    array(
        'name'  => 'Categorias',
        'url'   => 'categorias.php',
        'icon'  => 'ti-layers'
    ),
    array(
        'name'  => 'Productos',
        'icon'  => 'ti-package',
        'url'   => 'productos.php'
    ),
    array(
        'name'  => 'Ventas',
        'icon'  => 'ti-shopping-cart',
        'url'   => 'ventas.php'
    ),
    array(
        'name'  => 'Detalle Ventas',
        'icon'  => 'ti-files',
        'url'   => 'detalle_ventas.php'
    ),
    array(
        'name'  => 'Clientes',
        'icon'  => 'ti-face-smile',
        'url'   => 'clientes.php'
    ),
    array(
        'name'  => 'Pilotos',
        'icon'  => 'ti-id-badge',
        'url'   => 'pilotos.php'
    ),
    array(
        'name'  => 'Rutas',
        'icon'  => 'ti-location-arrow',
        'url'   => 'rutas.php'
    ),
    array(
        'name'  => 'Vehiculos',
        'icon'  => 'ti-truck',
        'url'   => 'vehiculos.php'
    ),
    array(
        'name'  => 'Mapa',
        'icon'  => 'ti-map-alt',
        'url'   => 'mapa.php'
    ),
    array(
        'name'  => 'Usuarios',
        'icon'  => 'ti-user',
        'url'   => 'usuarios.php'
    )
    
);

?>