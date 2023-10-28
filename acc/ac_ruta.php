<?php
session_start();
require '../vendor/autoload.php';
    $clase = new YocoTec\Ruta;
    date_default_timezone_set('America/Guatemala');


if($_SERVER['REQUEST_METHOD'] === "POST"){

    if($_POST['accion']==='Guardar'){

        if(empty($_POST['inputCodigo']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputReferencia']))
            exit('El campo nombre es requerido');

        $_params = array(
            'codigo'=>$_POST['inputCodigo'],
            'referencia'=>$_POST['inputReferencia'],
            'estado'=>$_POST['radioEstado'],
            'fecha'=>date("Y-m-d"),
            'usuario'=>$_SESSION['usuario_info']['usuario']

        );

        $rpt = $clase->registrar($_params);

        if($rpt)
            header('Location: ../rutas.php');
        else
            print 'Error al registrar una Ruta'; 

    }

    if($_POST['accion']==='Actualizar'){

        if(empty($_POST['inputCodigo']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputReferencia']))
            exit('El campo nombre es requerido');

        $_params = array(
            'id'=>$_POST['inputID'],
            'codigo'=>$_POST['inputCodigo'],
            'referencia'=>$_POST['inputReferencia'],
            'estado'=>$_POST['radioEstado'],
            'usuario'=>$_SESSION['usuario_info']['usuario']

        );

        $rpt = $clase->actualizar($_params);

        if($rpt)
            header('Location: ../rutas.php');
        else
            print 'Error al actualizar una Ruta'; 

    }

}

if($_SERVER['REQUEST_METHOD'] === "GET"){

    if($_GET['sus']){
        if(empty($_GET['sus']))
        exit('El campo no se encontro');

        $rpt = $clase->suspender($_GET['sus']);
        if($rpt)
            header('Location: ../rutas.php');
        else
            print 'Error al Suspender Ruta';
    }else
    if($_GET['act']){
        if(empty($_GET['act']))
        exit('El campo no se encontro');

        $rpt = $clase->activar($_GET['act']);
        if($rpt)
            header('Location: ../rutas.php');
        else
            print 'Error al Activar Ruta';
    }



    
}

?>