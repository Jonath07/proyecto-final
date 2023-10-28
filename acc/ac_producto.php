<?php
session_start();
require '../vendor/autoload.php';
date_default_timezone_set('America/Guatemala');

$producto = new YocoTec\Producto;

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if($_POST['accion']==='Guardar'){


        if(empty($_POST['inputNombre']))
            exit('Completar Nombre');

        if(empty($_POST['inputDescripcion']))
            exit('Completar descripcion');

        if(empty($_POST['inputCategoria']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['inputCategoria']))
            exit('Seleccionar una Categoria valida');

        if(empty($_POST['inputPrecio']))
            exit('Seleccionar una Categoria');


        $_params = array(
            'producto'=>$_POST['inputNombre'],
            'descripcion'=>$_POST['inputDescripcion'],
            'categoria'=>$_POST['inputCategoria'],
            'precio'=>$_POST['inputPrecio'],
            'estado'=>$_POST['radioInline'],
            'img'=> subirFotoProducto(),
            'fecha'=> date('Y-m-d'),
            'hora'=>date("H:i:s"),
            'usuario'=>$_SESSION['usuario_info']['usuario'],

        );

        $rpt = $producto->registrar($_params);

        if($rpt)
            header('Location: ../productos.php');
        else
            print 'Error al registrar un Producto'; 

    }

    if($_POST['accion']==='Actualizar'){


        if(empty($_POST['inputNombre']))
            exit('Completar Nombre');

        if(empty($_POST['inputDescripcion']))
            exit('Completar descripcion');

        if(empty($_POST['inputCategoria']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['inputCategoria']))
            exit('Seleccionar una Categoria valida');

        if(empty($_POST['inputPrecio']))
            exit('Seleccionar una Categoria');


        $_params = array(
            'producto'=>$_POST['inputNombre'],
            'descripcion'=>$_POST['inputDescripcion'],
            'categoria'=>$_POST['inputCategoria'],
            'precio'=>$_POST['inputPrecio'],
            'estado'=>$_POST['radioInline'],
            'img'=> ActualizarFotoProducto(),
            'usuario'=>$_SESSION['usuario_info']['usuario'],
            'id' => $_POST['inputID']

        );

        $rpt = $producto->actualizar($_params);

        if($rpt)
            header('Location: ../productos.php');
        else
            print 'Error al Actualizar un Producto'; 

    }
}

if($_SERVER['REQUEST_METHOD'] === "GET"){

    if($_GET['sus']){
        if(empty($_GET['sus']))
        exit('El campo no se encontro');

        $rpt = $producto->suspender($_GET['sus']);
        if($rpt)
            header('Location: ../productos.php');
        else
            print 'Error al Suspender un Producto';
    }else
    if($_GET['act']){
        if(empty($_GET['act']))
        exit('El campo no se encontro');

        $rpt = $producto->activar($_GET['act']);
        if($rpt)
            header('Location: ../productos.php');
        else
            print 'Error al Activar un producto';
    }
}

function ActualizarFotoProducto(){
    

    if(subirFotoProducto() == ""){
        return $_POST['foto2'];
    }else{
        return subirFotoProducto();
    }

}

function subirFotoProducto(){
        $carpeta = __DIR__.'/../assets/images/products/';

        $archivo = $carpeta.$_FILES['foto']['name'];
    
        move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);
    
        return $_FILES['foto']['name'];

}

?>