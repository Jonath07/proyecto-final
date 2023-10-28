<?php

namespace YocoTec;

use PDO;

class Ruta{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function mostrar(){
        $sql = "SELECT * FROM tbl_rutas";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarActivo(){
        $sql = "SELECT * FROM tbl_rutas WHERE estado_ruta = 1";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorID($id){
        $sql = "SELECT * FROM tbl_rutas WHERE id_ruta = $id";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

    public function registrar($_params){
        $sql = "INSERT INTO tbl_rutas(`codigo_ruta`,`referencia_ruta`,`usuario`,`estado_ruta`,`fecha_ruta`) 
        VALUES (:p1,:p2,:p3,:p4,:p5)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['codigo'],
            ":p2" => $_params['referencia'],
            ":p3" => $_params['usuario'],
            ":p4" => $_params['estado'],
            ":p5" => $_params['fecha']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar($_params){
        $sql = "UPDATE tbl_rutas SET codigo_ruta = :p1, referencia_ruta = :p2, usuario = :p3, estado_ruta = :p4 WHERE id_ruta =:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['codigo'],
            ":p2" => $_params['referencia'],
            ":p3" => $_params['usuario'],
            ":p4" => $_params['estado'],
            ":id" => $_params['id']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    

    public function suspender($id){
        $sql = "UPDATE `tbl_rutas` SET estado_ruta = '2' WHERE id_ruta=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function activar($id){
        $sql = "UPDATE `tbl_rutas` SET estado_ruta = '1' WHERE id_ruta=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }


}