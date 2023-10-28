<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $pass = $_POST['inputContrasena'];
    $user = $_POST['inputUsuario'];

    require '../vendor/autoload.php';

    $usuario = new YocoTec\Usuario;

    $resultado = $usuario->login($pass,$user);

    if($resultado){

    session_start();

        $_SESSION['usuario_info'] = array(
            'id_usuario'=>$resultado['id_usuario'],
            'nombre_usuario'=>$resultado['nombre_usuario'],
            'apellido_usuario'=>$resultado['apellido_usuario'],
            'usuario'=>$resultado['usuario'],
            'email_usuario'=>$resultado['email_usuario'],
            'estado_usuario'=>$resultado['estado_usuario'],
            'img_usuario'=>$resultado['img_usuario'],
        );

        header('Location: ../index.php');

    }else {

        header('Location: ../login.php');
    }

}

?>