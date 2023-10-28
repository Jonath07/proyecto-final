<?php
session_start();
require '../vendor/autoload.php';
    $clase = new YocoTec\Usuario;
    date_default_timezone_set('America/Guatemala');


if($_SERVER['REQUEST_METHOD'] === "POST"){

    if($_POST['accion']==='Guardar'){

        if(empty($_POST['inputNombre']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputApellido']))
            exit('El campo apellido es requerido');

        if(empty($_POST['inputUsuario']))
            exit('El campo usuario es requerido');

        if(empty($_POST['inputPassword']))
            exit('El campo contraseña es requerido');


        $_params = array(
            'nombre'=>$_POST['inputNombre'],
            'apellido'=>$_POST['inputApellido'],
            'usuario'=>$_POST['inputUsuario'],
            'email'=>$_POST['inputEmail'],
            'password'=>$_POST['inputPassword'],
            'estado'=>$_POST['radioEstado'],
            'direccion'=>$_POST['inputDireccion'],
            'img'=>$_POST['inlineAvatar'],

        );

        $rpt = $clase->registrar($_params);

        if($rpt)
            header('Location: ../usuarios.php');
        else
            print 'Error al registrar un Usuario'; 

    }

    if($_POST['accion']==='Actualizar'){

        if(empty($_POST['inputNombre']))
            exit('El campo nombre es requerido');

        if(empty($_POST['inputApellido']))
            exit('El campo apellido es requerido');

        if(empty($_POST['inputUsuario']))
            exit('El campo usuario es requerido');

        if(empty($_POST['inputPassword']))
            exit('El campo contraseña es requerido');


        $_params = array(
            'nombre'=>$_POST['inputNombre'],
            'apellido'=>$_POST['inputApellido'],
            'usuario'=>$_POST['inputUsuario'],
            'email'=>$_POST['inputEmail'],
            'password'=>$_POST['inputPassword'],
            'estado'=>$_POST['radioEstado'],
            'direccion'=>$_POST['inputDireccion'],
            'img'=>$_POST['inlineAvatar'],
            'id'=>$_SESSION['usuario_info']['id_usuario'],

        );

        $rpt = $clase->actualizar($_params);

        if($rpt)
            header('Location: ./ac_salir.php');
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
            header('Location: ../usuarios.php');
        else
            print 'Error al Suspender un Usuario';
    }else
    if($_GET['act']){
        if(empty($_GET['act']))
        exit('El campo no se encontro');

        $rpt = $clase->activar($_GET['act']);
        if($rpt)
            header('Location: ../usuarios.php');
        else
            print 'Error al Activar un Usuario';
    }



    
}

?>