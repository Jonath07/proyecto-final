<?php

namespace YocoTec;

use PDO;

class Producto{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function mostrar(){
        $sql = "SELECT * FROM tbl_productos";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarUltimosDos(){
        $sql = "SELECT * FROM tbl_productos 
        ORDER BY id_producto DESC LIMIT 2";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarCantidad($cantidad){
        $sql = "SELECT * FROM tbl_productos";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorID($id){
        $sql = "SELECT * FROM tbl_productos WHERE id_producto = $id";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

    public function registrar($_params){
        $sql = "INSERT INTO tbl_productos(`nombre_producto`, `descripcion_producto`, `estado_producto`, `fecha_producto`, `hora_producto`, `usuario`, `id_categoria_producto`, `precio_producto`, `img_producto`)
        VALUES (:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['producto'],
            ":p2" => $_params['descripcion'],
            ":p3" => $_params['estado'],
            ":p4" => $_params['fecha'],
            ":p5" => $_params['hora'],
            ":p6" => $_params['usuario'],
            ":p7" => $_params['categoria'],
            ":p8" => $_params['precio'],
            ":p9" => $_params['img']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar($_params){
        $sql = "UPDATE tbl_productos SET nombre_producto = :p1, descripcion_producto = :p2, estado_producto = :p3, usuario = :p4, id_categoria_producto = :p5, precio_producto = :p6, img_producto = :p7 WHERE id_producto = :id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['producto'],
            ":p2" => $_params['descripcion'],
            ":p3" => $_params['estado'],
            ":p4" => $_params['usuario'],
            ":p5" => $_params['categoria'],
            ":p6" => $_params['precio'],
            ":p7" => $_params['img'],
            "id" => $_params['id']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function suspender($id){
        $sql = "UPDATE `tbl_productos` SET estado_producto = '2' WHERE id_producto=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function activar($id){
        $sql = "UPDATE `tbl_productos` SET estado_producto = '1' WHERE id_producto=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

}