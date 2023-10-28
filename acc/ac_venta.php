<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === "POST"){

    require '../vendor/autoload.php';
    require '../funciones.php';

    if(isset($_SESSION['venta'])&& !empty($_SESSION['venta'])){

        $venta = new YocoTec\Venta;

        $_params = array(
            'piloto' => $_POST['inputPiloto'],
            'vehiculo' => $_POST['inputVehiculo'],
            'ruta' => $_POST['inputRuta'],
            'fecha' => $_POST['inputFecha'],
            'usuario' => $_SESSION['usuario_info']['usuario'],
            'total' => calcularTotal(),
            'nota' => $_POST['inputNota'],
            'estado' => '1'
        );

        $venta_id = $venta->registrar($_params);

        foreach($_SESSION['venta'] as $indice => $value){
            $_params = array(
                "id_venta" => $venta_id,
                "id_producto" => $value['id'],
                "cantidad" => $value['cantidad'],
                "precio" => $value['precio'],
                
            );

            $venta->registrarDetalle($_params);

        }

        $_SESSION['venta'] = array();

        header('Location: ../detalle_ventas.php');



    }


}


?>