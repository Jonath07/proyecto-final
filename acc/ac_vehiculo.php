<?php
session_start();
require '../vendor/autoload.php';
    $clase = new YocoTec\Vehiculo;
    date_default_timezone_set('America/Guatemala');


if($_SERVER['REQUEST_METHOD'] === "POST"){

    if($_POST['accion']==='Guardar'){

        if(empty($_POST['inputPlaca']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputMarca']))
            exit('El campo nombre es requerido');

        $_params = array(
            'placa'=>$_POST['inputPlaca'],
            'marca'=>$_POST['inputMarca'],
            'capacidad'=>$_POST['inputCapacidad'],
            'estado'=>$_POST['radioEstado'],
            'fecha'=>date("Y-m-d"),
            'hora'=>date("H:i:s"),
            'usuario'=>$_SESSION['usuario_info']['usuario']

        );

        $rpt = $clase->registrar($_params);

        if($rpt)
            header('Location: ../vehiculos.php');
        else
            print 'Error al registrar un Vehiculos'; 

    }

    if($_POST['accion']==='Actualizar'){

        if(empty($_POST['inputPlaca']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputMarca']))
            exit('El campo nombre es requerido');

        $_params = array(
            'placa'=>$_POST['inputPlaca'],
            'marca'=>$_POST['inputMarca'],
            'capacidad'=>$_POST['inputCapacidad'],
            'estado'=>$_POST['radioEstado'],
            'usuario'=>$_SESSION['usuario_info']['usuario'],
            'id'=>$_POST['inputID']
        );

        $rpt = $clase->actualizar($_params);

        if($rpt)
            header('Location: ../vehiculos.php');
        else
            print 'Error al registrar un Vehiculos'; 

    }

}

if($_SERVER['REQUEST_METHOD'] === "GET"){

    if($_GET['sus']){
        if(empty($_GET['sus']))
        exit('El campo no se encontro');

        $rpt = $clase->suspender($_GET['sus']);
        if($rpt)
            header('Location: ../vehiculos.php');
        else
            print 'Error al Suspender un Vehiculo';
    }else
    if($_GET['act']){
        if(empty($_GET['act']))
        exit('El campo no se encontro');

        $rpt = $clase->activar($_GET['act']);
        if($rpt)
            header('Location: ../vehiculos.php');
        else
            print 'Error al Activar un Vehiculo';
    }



    
}


?>