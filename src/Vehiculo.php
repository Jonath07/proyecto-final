<?php

namespace YocoTec;

use PDO;

class Vehiculo{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function mostrar(){
        $sql = "SELECT * FROM tbl_vehiculos";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorID($id){
        $sql = "SELECT * FROM tbl_vehiculos WHERE id_vehiculo = $id";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

    public function mostrarActivo(){
        $sql = "SELECT * FROM tbl_vehiculos WHERE estado_vehiculo = 1";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function registrar($_params){
        $sql = "INSERT INTO tbl_vehiculos(`placa_vehiculo`,`marca_vehiculo`,`capacidad_vehiculo`,`usuario`,`estado_vehiculo`,`fecha_vehiculo`,`hora_vehiculo`) 
        VALUES (:p1,:p2,:p3,:p4,:p5,:p6,:p7)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['placa'],
            ":p2" => $_params['marca'],
            ":p3" => $_params['capacidad'],
            ":p4" => $_params['usuario'],
            ":p5" => $_params['estado'],
            ":p6" => $_params['fecha'],
            ":p7" => $_params['hora']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar($_params){
        $sql = "UPDATE tbl_vehiculos SET placa_vehiculo = :p1, marca_vehiculo = :p2, capacidad_vehiculo = :p3, usuario = :p4, estado_vehiculo = :p5 WHERE id_vehiculo = :id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['placa'],
            ":p2" => $_params['marca'],
            ":p3" => $_params['capacidad'],
            ":p4" => $_params['usuario'],
            ":p5" => $_params['estado'],
            ":id" => $_params['id']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function suspender($id){
        $sql = "UPDATE `tbl_vehiculos` SET estado_vehiculo = '2' WHERE id_vehiculo=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function activar($id){
        $sql = "UPDATE `tbl_vehiculos` SET estado_vehiculo = '1' WHERE id_vehiculo=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }


}