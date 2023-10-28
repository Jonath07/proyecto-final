<?php
session_start();

require '../vendor/autoload.php';
    $clase = new YocoTec\Cliente;
    date_default_timezone_set('America/Guatemala');


if($_SERVER['REQUEST_METHOD'] === "POST"){

    if($_POST['accion']==='Guardar'){

        if(empty($_POST['inputNombre']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputApellido']))
            exit('El campo apellido es requerido');

        if(empty($_POST['inputDireccion']))
            exit('El campo usuario es requerido');

        $_params = array(
            'nombre'=>$_POST['inputNombre'],
            'apellido'=>$_POST['inputApellido'],
            'telefono'=>$_POST['inputTelefono'],
            'email'=>$_POST['inputEmail'],
            'estado'=>$_POST['radioEstado'],
            'direccion'=>$_POST['inputDireccion'],
            'referencia'=>$_POST['inputReferencia'],
            'fecha'=>date("Y-m-d"),
            'hora'=>date("H:i:s"),
            'usuario'=>$_SESSION['usuario_info']['usuario'],
        );

        $rpt = $clase->registrar($_params);

        if($rpt)
            header('Location: ../clientes.php');
        else
            print 'Error al registrar un Cliente'; 

    }

    if($_POST['accion']==='Actualizar'){

        if(empty($_POST['inputNombre']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputApellido']))
            exit('El campo apellido es requerido');

        if(empty($_POST['inputDireccion']))
            exit('El campo usuario es requerido');

        $_params = array(
            'id'=>$_POST['inputID'],
            'nombre'=>$_POST['inputNombre'],
            'apellido'=>$_POST['inputApellido'],
            'email'=>$_POST['inputEmail'],
            'telefono'=>$_POST['inputTelefono'],
            'estado'=>$_POST['radioEstado'],
            'direccion'=>$_POST['inputDireccion'],
            'referencia'=>$_POST['inputReferencia'],
            'usuario'=>$_SESSION['usuario_info']['usuario'],
        );

        $rpt = $clase->actualizar($_params);

        if($rpt)
            header('Location: ../clientes.php');
        else
            print 'Error al actualizar un Cliente'; 

    }

    if($_POST['coordenadas']==='asignar'){

        if(empty($_POST['inputCoo1']))
            exit('El campo es requerido');

        if(empty($_POST['inputCoo2']))
            exit('El campo es requerido');

        if(empty($_POST['inputID']))
            exit('El campo es requerido');

        $_params = array(
            'id'=>$_POST['inputID'],
            'coo1'=>$_POST['inputCoo1'],
            'coo2'=>$_POST['inputCoo2'],
            'fecha'=>date("Y-m-d"),
            'usuario'=>$_SESSION['usuario_info']['usuario'],
        );

        $rpt = $clase->registrarCoordenada($_params);

        if($rpt)
            header('Location: ../clientes.php');
        else
            print 'Error al registrar una coordenada'; 

    }
}

if($_SERVER['REQUEST_METHOD'] === "GET"){

    if($_GET['sus']){
        if(empty($_GET['sus']))
        exit('El campo no se encontro');

        $rpt = $clase->eliminar($_GET['sus']);
        if($rpt)
            header('Location: ../clientes.php');
        else
            print 'Error al Suspender Cliente';
    }else
    if($_GET['act']){
        if(empty($_GET['act']))
        exit('El campo no se encontro');

        $rpt = $clase->activar($_GET['act']);
        if($rpt)
            header('Location: ../clientes.php');
        else
            print 'Error al Activar Cliente';
    }



    
}

?>