<?php
session_start();
require '../vendor/autoload.php';
    $clase = new YocoTec\Categoria;
    date_default_timezone_set('America/Guatemala');


if($_SERVER['REQUEST_METHOD'] === "POST"){

    if($_POST['accion']==='Guardar'){

        if(empty($_POST['inputNombre']))
            exit('El campo nombre es requerido');

        $_params = array(
            'nombre'=>$_POST['inputNombre'],
            'estado'=>$_POST['radioEstado'],
            'fecha'=>date("Y-m-d"),
            'hora'=>date("H:i:s"),
            'usuario'=>$_SESSION['usuario_info']['usuario']

        );

        $rpt = $clase->registrar($_params);

        if($rpt)
            header('Location: ../categorias.php');
        else
            print 'Error al registrar una Categoria'; 

    }

    if($_POST['accion']==='Actualizar'){

        if(empty($_POST['inputNombre']))
            exit('El campo nombre es requerido');

            if(empty($_POST['inputID']))
            exit('El campo nombre es requerido');

        $_params = array(
            'id'=>$_POST['inputID'],
            'nombre'=>$_POST['inputNombre'],
            'estado'=>$_POST['radioEstado'],
            'usuario'=>$_SESSION['usuario_info']['usuario']

        );

        $rpt = $clase->actualizar($_params);

        if($rpt)
            header('Location: ../categorias.php');
        else
            print 'Error al actualizar perfil'; 

    }
}

if($_SERVER['REQUEST_METHOD'] === "GET"){

    if($_GET['sus']){
        if(empty($_GET['sus']))
        exit('El campo no se encontro');

        $rpt = $clase->eliminar($_GET['sus']);
        if($rpt)
            header('Location: ../categorias.php');
        else
            print 'Error al Suspender Categoria';
    }else
    if($_GET['act']){
        if(empty($_GET['act']))
        exit('El campo no se encontro');

        $rpt = $clase->activar($_GET['act']);
        if($rpt)
            header('Location: ../categorias.php');
        else
            print 'Error al Activar Categoria';
    }



    
}

?>