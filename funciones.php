<?php
function aggProducto($resultado, $id, $cantidad = 1){
    $_SESSION['venta'][$id] = array(
        'id' => $resultado['id_producto'],
        'nombre' => $resultado['nombre_producto'],
        'descripcion' => $resultado['descripcion_producto'],
        'categoria' => $resultado['id_categoria_producto'],
        'precio' => $resultado['precio_producto'],
        'img' => $resultado['img_producto'],
        'cantidad' => $cantidad
    );
}

function actProducto($id,$cantidad = FALSE){
    if($cantidad){
        $_SESSION['venta'][$id]['cantidad'] = $cantidad;
    }else{
        $_SESSION['venta'][$id]['cantidad']+=1;
    }
}

function calcularTotal(){
    $total = 0;
    if(isset($_SESSION['venta'])){
        foreach($_SESSION['venta'] as $indice => $value){
            $total += $value['precio'] * $value['cantidad'];
        }
    }
    return $total;
}

function cantidadProducto(){
    $cantidad = 0;
    if(isset($_SESSION['venta'])){
        foreach($_SESSION['venta'] as $indice => $value){
            $cantidad++;
        }
    }
    return $cantidad;
}

?>