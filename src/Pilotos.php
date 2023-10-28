<?php

namespace YocoTec;

use PDO;

class Pilotos{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function mostrar(){
        $sql = "SELECT * FROM tbl_pilotos";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarActivo(){
        $sql = "SELECT * FROM tbl_pilotos WHERE estado_piloto = 1";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorID($id){
        $sql = "SELECT * FROM tbl_pilotos WHERE id_piloto = $id";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

    public function registrar($_params){
        $sql = "INSERT INTO tbl_pilotos(`nombre_piloto`,`apellido_piloto`,`estado_piloto`,`fecha_piloto`,`hora_piloto`,`usuario`,`direccion_piloto`,`telefono_piloto`) 
        VALUES (:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['nombre'],
            ":p2" => $_params['apellido'],
            ":p3" => $_params['estado'],
            ":p4" => $_params['fecha'],
            ":p5" => $_params['hora'],
            ":p6" => $_params['usuario'],
            ":p7" => $_params['direccion'],
            ":p8" => $_params['telefono']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar($_params){
        $sql = "UPDATE tbl_pilotos SET nombre_piloto = :p1, apellido_piloto = :p2, estado_piloto = :p3, usuario = :p4, direccion_piloto = :p5, telefono_piloto = :p6 WHERE id_piloto = :id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['nombre'],
            ":p2" => $_params['apellido'],
            ":p3" => $_params['estado'],
            ":p4" => $_params['usuario'],
            ":p5" => $_params['direccion'],
            ":p6" => $_params['telefono'],
            ":id" => $_params['id']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function suspender($id){
        $sql = "UPDATE `tbl_pilotos` SET estado_piloto = '2' WHERE id_piloto=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function activar($id){
        $sql = "UPDATE `tbl_pilotos` SET estado_piloto = '1' WHERE id_piloto=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }


}