<?php
session_start();
require '../vendor/autoload.php';
    $clase = new YocoTec\Reporte;
    date_default_timezone_set('America/Guatemala');


if($_SERVER['REQUEST_METHOD'] === "POST"){

    if($_POST['accion']==='RangoFecha'){

        if(empty($_POST['inputFechaInicio']))
            exit('El campo es requerido');

        if(empty($_POST['inputFechaFin']))
            exit('El campo es requerido');

        $_params = array(
            'fechaUno'=>$_POST['inputFechaInicio'],
            'fechaDos'=>$_POST['inputFechaFin']
        );

        $rpt = $clase->mostrarPorFecha($_params);

        if($rpt)
            header('Location: ../pilotos.php');
        else
            print 'Error al registrar un Piloto'; 

    }
    
}


?>