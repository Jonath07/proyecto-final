<?php

namespace YocoTec;

use PDO;

class Venta{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function mostrarDetallesID($id){
        $sql = "SELECT * FROM tbl_ventas v
                INNER JOIN tbl_pilotos p ON v.id_piloto = p.id_piloto
                INNER JOIN tbl_vehiculos vh ON v.id_vehiculo = vh.id_vehiculo
                INNER JOIN tbl_rutas r ON v.id_ruta = r.id_ruta
                WHERE id_venta = $id";
        
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

    public function mostrarDetalles(){
        $sql = "SELECT * FROM tbl_ventas v
                INNER JOIN tbl_pilotos p ON v.id_piloto = p.id_piloto
                INNER JOIN tbl_vehiculos vh ON v.id_vehiculo = vh.id_vehiculo
                INNER JOIN tbl_rutas r ON v.id_ruta = r.id_ruta
                ORDER BY id_venta DESC";
        
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarDetallesDos(){
        $sql = "SELECT * FROM tbl_ventas v
                INNER JOIN tbl_pilotos p ON v.id_piloto = p.id_piloto
                INNER JOIN tbl_vehiculos vh ON v.id_vehiculo = vh.id_vehiculo
                INNER JOIN tbl_rutas r ON v.id_ruta = r.id_ruta
                ORDER BY id_venta DESC LIMIT 3";
        
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarProductosDetalle($id){
        $sql = "SELECT * FROM tbl_venta_detalles v
                INNER JOIN tbl_productos p ON v.id_producto = p.id_producto
                WHERE id_venta = $id";
        
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarActivo(){
        $sql = "SELECT * FROM tbl_ventas WHERE estado_venta = 1";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function registrar($_params){
        $sql = "INSERT INTO tbl_ventas(`id_piloto`, `id_vehiculo`, `id_ruta`, `fecha_venta`, `usuario`, `total_venta`, `nota_venta`, `estado_venta`) 
        VALUES (:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['piloto'],
            ":p2" => $_params['vehiculo'],
            ":p3" => $_params['ruta'],
            ":p4" => $_params['fecha'],
            ":p5" => $_params['usuario'],
            ":p6" => $_params['total'],
            ":p7" => $_params['nota'],
            ":p8" => $_params['estado']
        );
        if($resultado->execute($_array)){
            return $this->cn->lastInsertId();
        }else{
            return false;
        }
    }

    public function registrarDetalle($_params){
        $sql = "INSERT INTO `tbl_venta_detalles`(`id_venta`, `id_producto`, `cantidad_venta`, `precio_venta`) 
        VALUES (:p1,:p2,:p3,:p4)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['id_venta'],
            ":p2" => $_params['id_producto'],
            ":p3" => $_params['cantidad'],
            ":p4" => $_params['precio']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function sumaTotal(){
        $sql = "SELECT SUM(total_venta) as SumaTotal FROM tbl_ventas";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }


}