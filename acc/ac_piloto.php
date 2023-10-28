<?php
session_start();
require '../vendor/autoload.php';
    $clase = new YocoTec\Pilotos;
    date_default_timezone_set('America/Guatemala');


if($_SERVER['REQUEST_METHOD'] === "POST"){

    if($_POST['accion']==='Guardar'){

        if(empty($_POST['inputNombre']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputApellido']))
            exit('El campo nombre es requerido');

        $_params = array(
            'nombre'=>$_POST['inputNombre'],
            'apellido'=>$_POST['inputApellido'],
            'estado'=>$_POST['radioEstado'],
            'fecha'=>date("Y-m-d"),
            'hora'=>date("H:i:s"),
            'usuario'=>$_SESSION['usuario_info']['usuario'],
            'direccion'=>$_POST['inputDireccion'],
            'telefono'=>$_POST['inputTelefono'],

        );

        $rpt = $clase->registrar($_params);

        if($rpt)
            header('Location: ../pilotos.php');
        else
            print 'Error al registrar un Piloto'; 

    }

    if($_POST['accion']==='Actualizar'){

        if(empty($_POST['inputNombre']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputApellido']))
            exit('El campo nombre es requerido');

        $_params = array(
            'nombre'=>$_POST['inputNombre'],
            'apellido'=>$_POST['inputApellido'],
            'estado'=>$_POST['radioEstado'],
            'usuario'=>$_SESSION['usuario_info']['usuario'],
            'direccion'=>$_POST['inputDireccion'],
            'telefono'=>$_POST['inputTelefono'],
            'id'=>$_POST['inputID'],
        );

        $rpt = $clase->actualizar($_params);

        if($rpt)
            header('Location: ../pilotos.php');
        else
            print 'Error al actualizar un Piloto'; 

    }

    
}

if($_SERVER['REQUEST_METHOD'] === "GET"){
    if($_GET['sus']){
        if(empty($_GET['sus']))
        exit('El campo no se encontro');

        $rpt = $clase->suspender($_GET['sus']);
        if($rpt)
            header('Location: ../pilotos.php');
        else
            print 'Error al Suspender Piloto';
    }else
    if($_GET['act']){
        if(empty($_GET['act']))
        exit('El campo no se encontro');

        $rpt = $clase->activar($_GET['act']);
        if($rpt)
            header('Location: ../pilotos.php');
        else
            print 'Error al Activar Pilotos';
    }

}

?>